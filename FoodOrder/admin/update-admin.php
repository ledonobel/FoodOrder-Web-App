<?php include('partials/menu.php');?>



<div class="content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br> <br>
        <?php
             //GET the ID of selected Admin
             $id=$_GET['id'];
             //Create Sql query to get the details
             $sql="SELECT * FROM tbl_admin WHERE id=$id";
             //Execute the query
             $result=mysqli_query($dbsconn,$sql);
             //check
             if($result==true)
             {
                 //check if the data is available or not
                 $count= mysqli_num_rows($result);

                 if($count==1){

                        //get the detail from database
                        $rows = mysqli_fetch_assoc($result);

                        //variable to save the details

                        $full_name= $rows['full_name'];
                        $username= $rows['username']; 
                 }else{
                        //redirect
                        header('loacation:'.URL.'admin/manage-admin.php');

                 }
             }
        
        ?>
        <form action="" method="POST">
             <table class="tbl2">
                 <tr>
                     <td>Full Name: </td>
                     <td><input type="text" name="full_name" value="<?php echo $full_name?>"></td>
                 </tr>
                 <tr>
                     <td>Username: </td>
                     <td><input type="text" name="username" value="<?php echo $username?>"></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn">

                     </td>
                 </tr>

</table>
</form>
</div>
</div>
<br>
<br>
<br>
<?php 
    //check whether btn submit execute or not
    if(isset($_POST['submit'])){
        //get all values to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        //create sql query to update admin
        $sql= "UPDATE tbl_admin SET full_name = '$full_name', username = '$username' WHERE id='$id'";
        //execute query 
        $result=mysqli_query($dbsconn,$sql);
        //whether the query is successful or not
        if($result==true){

            $_SESSION['update'] ="<div class='success'>ADMIN updated successfully";
            header('location:'.URL.'admin/manage-admin.php');

        }else{

            $_SESSION['update' ] ="<div class='error'>failed to update ADMIN";
            header('location:'.URL.'admin/manage-admin.php');
        }
    }
?>


<?php include('partials/footer.php'); ?>