<?php include('partials/menu.php'); ?>
 <div class="content">
     <div class="wrapper">

     <?php   
                     if(isset($_SESSION['add'])){
                       echo $_SESSION['add'];//display session msg
                       unset($_SESSION['add']);//removing session message
                     }  ?>
                     <br>
                     <br>
                     <br>
         <h1> Add Admin </h1>
            <br>
            <br>
            <!-- GET Method through form-->
         <form action="" method="POST">
             <table class="tbl2">
                 <tr>
                     <td>Full Name: </td>
                     <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                 </tr>
                 <tr>
                     <td>Username: </td>
                     <td><input type="text" name="username" placeholder="your username"></td>
                 </tr>
                 <tr>
                     <td>Password: </td>
                     <td><input type="password" name="password" placeholder="your password"></td>
                 </tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" value="Add Admin" class="btn_second">
                    </td>
                 </tr>
              </table>     
         </form>
     </div>
 </div>
<?php include('partials/footer.php'); ?>
 <?php
 // process the value from form and save it in the database
 // check whether submit button is clicked or not
  if(isset($_POST['submit'])){
      //button clicked
      //get the data from from
      $full_name=$_POST['full_name'];
      $username=$_POST['username'];
      $password = md5($_POST['password']);// password encryption with md5 
      //sql query to save the data in DBS
      $sql = "INSERT INTO tbl_admin SET 
      full_name='$full_name',
      username='$username',
      password='$password' ";

      // execute query and saving data in database
      $result = mysqli_query($dbsconn,$sql) or die(mysqli_error());

      if($result==TRUE){
          //create session variable to display message
          $_SESSION['add']= "<div class='success'>Admin added successfully";
          //redirect page to manage admin
          header("location:".URL.'admin/manage-admin.php');
      } else{
          //create session variable to display message
          $_SESSION['add']= "<div class='error'>failed to add admin";
          //redirect page to add admin
          header("location:".URL.'admin/add-admin.php');
      }
  }

 ?>