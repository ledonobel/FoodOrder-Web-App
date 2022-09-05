<?php include('partials/menu.php');?>

<div class="content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br> <br>
            <!-- get id -->
            <?php 
              if(isset($_GET['id'])){

                $id=$_GET['id'];
              }
            ?>

        <form action="" method="POST">
             <table class="tbl2">
                 <tr>
                     <td>Current Password</td>
                     <td><input type="password" name="current_password" placeholder="Password"></td>
                 </tr>
                 <tr>
                     <td>New Password</td>
                     <td><input type="password" name="new_password" placeholder="New Password"></td>
                 </tr>
                 <tr>
                     <td>Confirm Password</td>
                     <td><input type="password" name="conf_password" placeholder="Confirm Password"></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         <input type="hidden" name="id" value="<?php echo $id?>">
                         <input type="submit" name="submit" value="Change Password" class="btn">
                    </td>
</tr>
                
</table>
</form>
</div>
</div>
<?php
  // check submit execute
  if(isset($_POST['submit'])){

    //get the data from form
    $id=$_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new = md5($_POST['new_password']);
    $confirm = md5($_POST['conf_password']);
    // check whether the current ID and password exists or not

    $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    // execute query
    $result=mysqli_query($dbsconn,$sql);
    if($result==true){

        //check if data available
        $count=mysqli_num_rows($result);
        if($count==1){
            //exists
            // new password and confirm password match or not
            if($new==$confirm){
                    //Update password
                    $sql2="UPDATE tbl_admin SET password='$new' WHERE id=$id ";
                    //execute query
                    $res=mysqli_query($dbsconn,$sql2);
                    //check whether query execute or not
                    if($res==true){
                        $_SESSION['change-pwd']="<div class='success'>Password changed successfully</div>";
                        header('location:'.URL.'admin/manage-admin.php');

                    }else{
                        $_SESSION['change-pwd']="<div class='error'>Failed to change passwword please try again</div>";
                        header('location:'.URL.'admin/manage-admin.php');


                    }

            }
            else{
                $_SESSION['pwd-donot-match']="<div class='error'>Password do not match please try again</div>";
            header('location:'.URL.'admin/manage-admin.php');
            }
        }else{

            // does not exist
            $_SESSION['u-n-f']="<div class='error'>User not found</div>";
            header('location:'.URL.'admin/manage-admin.php');
        }
    }
  }

?>




<?php include('partials/footer.php'); ?>