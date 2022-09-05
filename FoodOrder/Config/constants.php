<?php
// Start session

session_start();

// create constants to store non changing values
define('URL','http://localhost/FoodOrder/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('PASSWORD','');
define('DB_NAME','foodorder');

$dbsconn = mysqli_connect(LOCALHOST,DB_USERNAME) or die(mysqli_error());// for database connection
$dbs=mysqli_select_db($dbsconn,DB_NAME) or die(mysqli_error()); //selecting the database 
?>