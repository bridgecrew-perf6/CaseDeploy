<?php
//check if sent form data via submit button
if(isset($_POST['submit'])){

    $uid = $_POST['userid_email'];
    $pwd = $_POST['password'];

    //Instantiate loginContr class
    include "../Classes/Dbh.class.php";
    include "../Classes/Login.class.php";
    include "../Classes/LoginContr.class.php";
    $login = new LoginContr($uid, $pwd);
    //Running Error handlers and user login
    $uid = $login->userLogin();   

    //Instantiate inloginview class if login successfully
    include "../Classes/LoginView.class.php";
    $loginedView = new LoginView($uid);
    //get user data
    $loginedView->getUserData();

    //redirect
    header("location: ../Views/blog_userpage.php?status=logined");
}