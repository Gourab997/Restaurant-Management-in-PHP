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
            <h1>Order food</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 offset-md-3">

            <?php
                if ( isset($_GET['update']) ){
                  $updatefoods = $_GET['update'];
                  $myQuery = "SELECT * FROM orders WHERE orderno = '$updatefoods' ";
                  $allorders = mysqli_query($db, $myQuery);
                  while ( $row = mysqli_fetch_assoc($allorders) ) {
                     
                       $foodname   = $row['foodname'];
                      $foodprice   = $row['foodprice'];
                      $availability  = $row['availability'];
                     $Cusname   = $row['Cusname'];
                      $email      = $row['email'];
                      $phone      = $row['phone'];
                      $address    = $row['address'];
                      
                      
                    ?>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="foodname">Foodname</label>
                          <input type="text" name="foodname" value="<?php echo $foodname; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="foodprice">Foodprice</label>
                          <input type="number" name="foodprice" value="<?php echo $foodprice; ?>" class="form-control" required pattern="[0-9]{11}" title="invalid mobile number">
                        </div>

                        <div class="form-group">
                          <label for="availability">Availability</label>
                          <input type="text" name="availability" value="<?php echo $availability; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                        
                        <div class="form-group">
                           <label for="Cusname">Name</label>
                           <input type="text" name="Cusname"  value="<?php echo $Cusname; ?>"class="form-control" required pattern="[a-zA-Z]{3,15}" title="Invalid formet ">
                       </div>
             
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" required="required">
                        </div>
                           <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" required="required">
                       </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text"  value="<?php echo $address; ?>"name="address" class="form-control" required="required">
                    </div>
                     <div class="form-group">
                      <label for="status">Status</label>
                      <input type="text"  value=""name="status" class="form-control" required="required">
                    </div>
                        <div class="form-group">
                          <input type="submit" name="orderfood" class="btn btn-primary" value="Order">
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

    if ( isset($_POST['orderfood']) ){
      $foodname       = $_POST['foodname'];
      $foodprice      = $_POST['foodprice'];
      $availability   = $_POST['availability'];
      $Cusname       = $_POST['Cusname'];
      $email      = $_POST['email'];
      $phone   = $_POST['phone'];
      $address   = $_POST['address'];
       $status   = $_POST['status'];
      
     

        // Create the Insert Query to the Database
      $query = "INSERT INTO orders (foodname,foodprice,availability,Cusname,phone,email,address,status) VALUES ('$foodname','$foodprice','$availability','$Cusname','$phone','$email','$address','$status');";

        $orders = mysqli_query($db, $query);

        if ( !$orders ){
          die("MySQL Error, Data Insert Failed");
        }
        else{
          header("Location: deliveryman.php");
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