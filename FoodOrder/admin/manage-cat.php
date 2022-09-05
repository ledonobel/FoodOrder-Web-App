<?php include('partials/menu.php'); ?>
<div class="content">
          <div class="wrapper">
               <h1> manage category </h1>
                     <br>
                     <?php 
         //display the message
         if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);

         }
         if(isset($_SESSION['remove'])){
          echo $_SESSION['remove'];
          unset($_SESSION['remove']);

       }
       if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
 
     }
    ?><br><br>
               <a href="<?php echo URL;?>admin/add-category.php" class="btn">Add category</a>
                      <br>
                      <br>
               <table class="tbl_full">
                 <tr>
                   <th>S.N.</th>
                   <th>Title</th>
                   <th>Image</th>
                   <th>featured</th>
                   <th>Active</th>
                   <th>Actions</th>
                 </tr>

                 <?php 
                    //query to get category database
                    $sql= "SELECT * FROM tbl_category";

                    //execute the query
                    $result =mysqli_query($dbsconn,$sql);

                    //count the rows

                    $count = mysqli_num_rows($result);


                    $sn=1;

                    //check whether we have it in database or not
                    if($count>0){
                          // we have the data
                          // get data and display 
                          while($row=mysqli_fetch_assoc($result)){
                            $id=$row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active= $row['active'];

                            ?>
                               <tr>
                   <td><?php echo $sn++;?></td>
                   <td><?php echo $title;?></td>
                   <td><?php 
                   if($image_name!=""){
                      //then display

                      ?>
                      
                        <img src="<?php echo URL;?>images/category/<?php echo $image_name ?>" width="100px">

                      <?php

                   }else
                   
                   {
                        echo "<div class='error'>image not added</div>";


                   }
                   
                   ?></td>
                   <td><?php echo $featured;?></td>
                   <td><?php echo $active;?></td>
                   <td>
                     <a href="*" class="btn_second">Update category</a>
                     <!-- we get the values we want to delete and delete them from the images/category as well--> 
                     <a href="<?php echo URL;?>admin/delete-category.php?id<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn_third">Delete category</a>
                   </td>
                 </tr>
                            
                            
                            <?php


                          }

                    } else{

                            ?>
                          <tr>
                            <td colspan="6"><div class="error">no category added</div></td>
                          </tr>

                            <?php 


                     }
                 
                 ?>

              
               
               </table>
               
            </div>
          </div>    
<?php include('partials/footer.php'); ?>