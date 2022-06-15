<?php
    //check the $_GET parameter
    if(!empty($_GET['filename']))
    {
        $filename = basename($_GET['filename']);
        $filepath = '../Files/'.$filename;
        //check the filename and the file existence
        if(!empty($filename) && file_exists($filepath))
        {
            //define headers before send file
            header("Cache-Control: public; max-age=3600");                     //set cacha, hold for 1hour
            header("Content-Description: File Transfer");               
            header("Content-Disposition: attachment; filename = $filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary"); 

            readfile($filepath);
            
            //redirection to index page
            header("Location: index.php");
            die();
        }
        //if filename error or no exist file, return error message
        {
            alert("Download Error! Please try later.");
        }
    }
?>
