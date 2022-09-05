<?php 
//include constant

    include('../config/constants.php');

    // check if value is passed or not
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        //get the value to delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        //check if image file available then remove the image 
        if($image_name != "")
        {
            //remove image from the folder
            $path="../images/category/".$image_name;

            //remove image
            $remove=unlink($path);
            //if we failed to remove image from the folder
            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'> failed to remove category image </div>";
                header('location:'.URL.'admin/manage-cat.php');
                die();
            }
        }

        //remove from the database
        $sql="DELETE FROM tbl_category WHERE id='$id'";

        //execute query

        $result=mysqli_query($dbsconn,$sql);
        // check if the data is deleted from database or not
        if($result==true)
        {
            $_SESSION['delete']="<div class='success' > Category deleted successfully</div>";
            header('location:'.URL.'admin/manage-cat.php');
        }else{

        $_SESSION['delete']="<div class='error'>Failed to delete category</div>";
            header('location:'.URL.'admin/manage-cat.php');
        }

    }
    else{


        header('location:'.URL.'admin/manage-cat.php');
    }

?>