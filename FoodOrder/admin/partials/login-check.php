<?php
   // Authentication - Access control
   // check whether the user is logged in or out
    if(!isset($_SESSION['user'])){ //if user session is not set
        // user not logged in redirect to login page with message
        $_SESSION['notlogin']="<div class='error'> Please login to access Admin Panel</div>";
        header('location:'.URL.'admin/login.php');

    }
?>