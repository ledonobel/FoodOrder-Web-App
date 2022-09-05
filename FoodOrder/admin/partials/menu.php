<?php 

include('../Config/constants.php');
include('login-check.php'); //since we have the link in menu file we don't need to exit the folder(../sdf).?>

<html> 
    <head>
        <title>Food Order website - Home Page</title>
        <link rel="stylesheet" href="../css/admin.css"/>
    </head>    
    <body>
        <!-- Menu Section Starts -->
         <div class="menu text_center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">admin</a></li>
                    <li><a href="manage-cat.php">categories</a></li>
                    <li><a href="manage-food.php">food</a></li>
                    <li><a href="manage-order.php">order</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
         </div>