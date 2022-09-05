<?php include('partials/menu.php'); ?>

<div class="content">
    <div class="wrapper">
    <h1>ADD CATEGORY</h1><br><br>

    <?php 
         //display the message
         if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);

         }
         if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);

         }
    ?>
    <!--form category start  propriety ENCTYPE allowed to upload file-->
    <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl_full">
                 <tr>
                   <td>Title:</td>
                   <td>
                       <input type="text" name="title" placeholder="category title">
                   </td>
                </tr>
                <tr>
                   <td>Select Image</td>
                   <td>
                       <input type="file" name="image">
                   </td>
                </tr>
                <tr>
                   <td>Featured</td>
                   <td> 
                       <input type="radio" name="featured" value="yes"> YES
                       <input type="radio" name="featured" value="no"> NO
                   </td>
                </tr>
                    <tr>
                   <td>Active</td>
                   <td>
                   <input type="radio" name="active" value="yes"> YES
                       <input type="radio" name="active" value="no"> NO
                   </td>
                 </tr>
                 <tr>
                     <td colspan="2">  
                     <input type="submit" name="submit" value="add category" class="btn_second">
                     </td>
                 </tr>
    </table>
</form>

<?php 
    //check submit is clicked or not

    if(isset($_POST['submit'])){
        //get the value from category
        
        $title=$_POST['title'];
        //check if radio is selected or not
        if(isset($_POST['featured'])){

            //get value
            $featured=$_POST['featured'];
        }else{

            $featured="no";
        }

        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{

            $active="no";
        }

            //check if the image is selected or not
            if(isset($_FILES['image']['name'])){
            // to upload we need the image name, source path, destination path

            $image_name=$_FILES['image']['name'];

            //auto rename image
            //get the extension of our images(jpg, png, gif)
            $ext= end(explode('.',$image_name));

            //rename image
            $image_name = "Food_Category_".rand(000,999).'.'.$ext;//e.g: Food_Category_856.jpg

            $source_path=$_FILES['image']['tmp_name'];

            $destination="../images/category/".$image_name;

            //upload image
            $upload= move_uploaded_file($source_path,$destination);
            //check whether image is uploaded or not
            if($upload==false)
            {
                //set message
                $_SESSION['upload']="<div class='error'> failed to upload image</div>";
                header('location:'.URL.'admin/add-category.php');
                //stop process
                die();
            }


            }else{
                //don't upload set the value to blank
                $image_name="";

            }

           

        
             //sql query to insert category in database
        $sql="INSERT INTO tbl_category SET 
        title='$title',featured='$featured', image_name='$image_name', active='$active'
        ";
        
        //execute the query and save in database
        $result=mysqli_query($dbsconn,$sql);

        // check whether the query is executed or not  
        if($result==true){
            $_SESSION['add']="<div class='success'>category added successfully.</div>";
            header('location:'.URL.'admin/manage-cat.php');
        }else{

            $_SESSION['add']="<div class='error'>failed to add category.</div>";
            header('location:'.URL.'admin/add-category.php'); 
        }
       
            

       
    }
?>

    </div>
</div>

<?php include('partials/footer.php'); ?>