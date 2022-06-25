<?php
    //if no user login, back to login page
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location: blog_login.php");
        exit();
    }

    //log out
    if(isset($_GET['status'])&&$_GET['status']=="logout")
    {
        session_unset();
        session_destroy();
        header("location: blog_index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../Styles/blogstyle.css">
    <link rel="stylesheet" href="../Styles/substyle-article.css">
</head>
<body class = "blogsite">
    <div class="header">
        <header>
           <h1>Console.Blog</h1>
        </header>
    </div>
    <div class = "navbar">
        <ul>
            <li><a href="">Back</a></li>
            <li><a href="blog_index.php">search</a></li>
            <li><a href="../../home.php">home</a></li>
            <li><a href="blog_userpage.php?status=logout">Log Out: <?php echo $_SESSION['userid'];?></a></li>
        </ul>
    </div>
    <div class="main">
        <div class="content">
        <?php
            include "_form_field.php";
        ?>
        </div>
    </div>
    <div class="footer">
        <footer>
            &#174; Xiaobin Zhu <br>
            <script>document.write('Last Modified: '+document.lastModified);</script>
        </footer>
    </div>

</body>
</html>