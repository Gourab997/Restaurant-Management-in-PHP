<?php 
  ob_start();
  include "include/db.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">   

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>

  

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1>Update food Data</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 offset-md-3">

            <?php
                if ( isset($_GET['update']) ){
                  $updatefood = $_GET['update'];
                  $myQuery = "SELECT * FROM food WHERE id = '$updatefood' ";
                  $allfoods = mysqli_query($db, $myQuery);
                  while ( $row = mysqli_fetch_assoc($allfoods) ) {
                      $id         = $row['id'];
                      $foodname   = $row['foodname'];
                      $foodprice   = $row['foodprice'];
                      $availability  = $row['availability'];
                      $fcategory   = $row['fcategory'];
                      
                      
                    ?>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="foodname">Foodname</label>
                          <input type="text" name="foodname" value="<?php echo $foodname; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="foodprice">Foodprice</label>
                          <input type="number" name="foodprice" value="<?php echo $foodprice; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="availability">Availability</label>
                          <input type="text" name="availability" value="<?php echo $availability; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                         Update Category:

             <select name="fcategory">
               <option value="Bangla">Bangla</option>
               <option value="Indian">Indian</option>
               <option value="Thai">Thai</option>
               <option value="Chinese">Chinese</option>
             </select>
           </div>

                        </div>

                        

                    

                        <div class="form-group">
                          <input type="submit" name="updatefood" class="btn btn-primary" value="Update">
                        </div>
                      </form>

                  <?php  
                  } }
            ?>
          

          </div>
        </div>
      </div>
    </section>
    
    



  <?php

    if ( isset($_POST['updatefood']) ){
      $foodname       = $_POST['foodname'];
      $foodprice      = $_POST['foodprice'];
      $availability   = $_POST['availability'];
      $fcategory      = $_POST['fcategory'];
      
     

        // Create the Insert Query to the Database
      $query = "UPDATE food SET foodname='$foodname', foodprice='$foodprice', availability='$availability', fcategory='$fcategory' WHERE id = '$updatefood' ";

        $addfood = mysqli_query($db, $query);

        if ( !$addfood ){
          die("MySQL Error, Data Insert Failed");
        }
        else{
          header("Location: foodlist.php");
        }
    }
  ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <?php 
      ob_end_flush();
    ?>
  </body>
</html>