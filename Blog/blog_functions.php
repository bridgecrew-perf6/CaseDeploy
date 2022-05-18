<?php

    //import database connection file
    require_once "Lib/db.php";

    error_log("checkpoint2");

    function LoginValidation($userinput)
    {
        //import global variables
        global $mysql_conn, $mysql_response;

        //clear data
        $userid_email = $mysql_conn->real_escape_string($userinput['userid_email']);

        //use input data to query database
        $query = "SELECT * FROM UserDetail WHERE userId = '$userid_email' or Email = '$userid_email'";     //use email or userID to login.
        

        error_log("checkpoint2.1, ".$query);

        //retrieve server data, verify userId/email 
        if($result = MysqlQuery($query))
            //retrieve data in associative array format
            $data = $result->fetch_asssoc();
        else
        {
            //incorrect userId/email, no further verification, return result
            $userinput['response'] = "Invalid UserId/Email.";
            $userinput['status'] = false;
            return $userinput;
        }

        //verification of password ( matches a hash)
        //updata 'response' and 'status'
        if(password_verify($userinput['password'], $data['Password']))
        {
            $userinput['response'] = "Login successfully.";
            $userinput['status'] = true;

            //add login info to session
            $_SESSION['userId'] = $data['UserId'];
            $_SESSION['nickname'] = $data['NickName'];
        }
        else
        {
            $userinput['response'] = "Invalid password.";
            $userinput['status'] = false;
        }
        
        //update session and return result
        return $userinput;
    }


?>


