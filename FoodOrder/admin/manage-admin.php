<?php include('partials/menu.php'); ?>
      <!-- Main Content section Starts -->
          <div class="content">
          <div class="wrapper">

               <h1> Manage Admin </h1>
                      <br>
                      <br>
                      <!-- to display system message the button result and that been redirected to manage admin page-->
                  <?php   
                     if(isset($_SESSION['add'])){
                       echo $_SESSION['add'];//display session msg
                       unset($_SESSION['add']);//removing session message
                     }if(isset($_SESSION['delete'])){
                          echo $_SESSION['delete'];

                          unset($_SESSION['delete']);
                     }
                        if(isset($_SESSION['update'])){
                          echo $_SESSION['update'];

                          unset($_SESSION['update']);
                     } if(isset($_SESSION['u-n-f'])){
                      echo $_SESSION['u-n-f'];

                      unset($_SESSION['u-n-f']);}
                  
                    if(isset($_SESSION['pwd-donot-match'])){
                      echo $_SESSION['pwd-donot-match'];

                      unset($_SESSION['pwd-donot-match']);}

                      if(isset($_SESSION['change-pwd'])){
                        echo $_SESSION['change-pwd'];
  
                        unset($_SESSION['change-pwd']);}
                      
                      ?>
                     <br>
                     <br>
               <a href="add-admin.php" class="btn">Add</a>
                      <br>
                      <br>
               <table class="tbl_full">
                 <tr>
                   <th>S.N.</th>
                   <th>Full Name</th>
                   <th>Username</th>
                   <th>Actions</th>
                 </tr>
                      <?php 
                      //Query to get all admin
                      $sql = "SELECT * FROM tbl_admin";
                      $result= mysqli_query($dbsconn,$sql);
                      //Check whether the query is executed or not
                      if($result==TRUE){
                            $count= mysqli_num_rows($result);//function to get all the rows in database
                      //check num of rows
                         $sn=1; 
                      if($count>0){
                          while($rows=mysqli_fetch_assoc($result)){
                            // loop will run as long as condition is met
                            // get the rows
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                      
                    
                      ?>
                     
                 <tr>
                   <td><?php echo $sn++; ?></td>
                   <td><?php echo $full_name;?></td>
                   <td><?php echo $username;?></td>
                   <td>
                     <a href="<?php echo URL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn">Change Password</a>
                     <a href="<?php echo URL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn_second">Update</a>
                     <!--GET Method through url using a button --> 
                     <a href="<?php echo URL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn_third">Delete</a>
                   </td>
                 </tr>
                <?php 
                          }
                        }else{

                        }
                      }
                      ?>
               </table>
            </div>
          </div>    
        <!-- Main Content Section Ends -->
        <?php include('partials/footer.php');?>