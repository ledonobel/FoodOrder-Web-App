<?php include('partials/menu.php'); ?>
        
        <!-- Main Content section Starts -->
          <div class="content">
          <div class="wrapper">
               <h1> Dashboard </h1><br><br>

               <?php
            
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
               <div class="col-4 text_center">
                   <h1>5</h1>
                   Categories
                   <br>
                </div>
                <div class="col-4 text_center">
                   <h1>5</h1>
                   Categories
                   <br>
                </div>
                <div class="col-4 text_center">
                   <h1>5</h1>
                   Categories
                   <br>
                </div>
                <div class="col-4 text_center">
                   <h1>5</h1>
                   Categories
                   <br>
                </div>
                
               <div class="clearfix"></div>
            </div>
          </div>    
        <!-- Main Content Section Ends -->
       <?php include('partials/footer.php'); ?>