<?php 
include('../config/constants.php'); 
 // Destroy the session
 session_destroy();// Unset session
 header('location:'.URL.'admin/login.php');
?>