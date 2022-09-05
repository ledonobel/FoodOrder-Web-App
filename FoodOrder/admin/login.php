<?php include('../config/constants.php'); ?>
<html>

    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css"/>
    </head>
    <body>
        <div class="login">
            <h1 class="text_center">LOGIN</h1><br><br><br>

            <?php
            
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['notlogin'])){
                    echo $_SESSION['notlogin'];
                    unset($_SESSION['notlogin']);
                }
            ?><br> <br>
            <!--login form-->
          <form action="" method="POST" class="text_center">
            Username:<br> 
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="login" class="btn">
          </form>

        </div>
    </body>
</html>
<?php 
// check if submit is clicked //

if(isset($_POST['submit'])){
    //Process for login
    // get data from login form
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    //sql check whether user data exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'  ";

    //Execute query
    $result=mysqli_query($dbsconn,$sql);

    //count rows to check if the user exist or not

    $count = mysqli_num_rows($result);

    if($count==1){

        //user available and log in success
        $_SESSION['login']="<div class='success'>Login success</div>";
        //check if user logged in or not and log out will unset
        $_SESSION['user']=$username;

        header('location:'.URL.'admin/');

    }else{
             //user non available and log in failed
        $_SESSION['login']="<div class='error'>Username or password incorrect</div>";

        header('location:'.URL.'admin/login.php');

    }
}



?>