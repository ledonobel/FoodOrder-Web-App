<?php 

// include constants
  include('../config/constants.php');

// Get the ID of admin to be deleted
$id = $_GET['id'];

// Create SQl to delete admin 
$sql = " DELETE FROM tbl_admin WHERE id=$id";

//execute query
$result = mysqli_query($dbsconn, $sql);
//check if query executed successfully

if($result==TRUE){
    //session variable to display message
    $_SESSION['delete'] = "<div class='success'>admin deleted";
    //redirect to page manage admin
    header('location:'.URL.'admin/manage-admin.php');

}else{
    //session variable to display message
    $_SESSION['delete'] = "<div class='error'>failed to delete admin";
    //redirect to page manage admin
    header('location:'.URL.'admin/manage-admin.php');
}
// Redirect to admin page with message (success/error)
?>