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
    <style type="text/css">
        
        body{
            background-image:url(fgbdw1ryapcswir2jdnjuuuda05mqvwgnmxl5zvkfzpyp7xgu3jmmufivhxbjuoy-.jpg);
            background-size: cover;
            background-attachment: fixed;
        }

        .content{
            background: white;
            width: 50%;
            padding: 40px;
            margin: 100px auto;
            font-family: calibri;
            border-radius: 10px;
        }

        p{
            font-size: 25px;
            color: black;
        }

    </style>

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
                if ( isset($_GET['order']) ){
                  $orderfoods = $_GET['order'];
                  $myQuery = "SELECT * FROM food WHERE id = '$orderfoods' ";
                  $allfoods = mysqli_query($db, $myQuery);
                  while ( $row = mysqli_fetch_assoc($allfoods) ) {
                     
                       $foodname   = $row['foodname'];
                      $foodprice   = $row['foodprice'];
                      $availability  = $row['availability'];
                     
                      
                      
                    ?>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="foodname"><span style="color:white">Foodname</span></label>
                          <input type="text" name="foodname" value="<?php echo $foodname; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                          <label for="foodprice"><span style="color:white">Foodprice</span></label>
                          <input type="number" name="foodprice" value="<?php echo $foodprice; ?>" class="form-control" required pattern="[0-9]{11}" title="invalid mobile number">
                        </div>

                        <div class="form-group">
                          <label for="availability"><span style="color:white">Availability</span></label>
                          <input type="text" name="availability" value="<?php echo $availability; ?>" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                        
                        <div class="form-group">
                           <label for="Cusname"><span style="color:white">Name</span></label>
                           <input type="text" name="Cusname" class="form-control" required pattern="[a-zA-Z]{3,15}" title="Invalid formet ">
                       </div>
             
                        <div class="form-group">
                          <label for="phone"><span style="color:white">Phone</span></label>
                          <input type="text" name="phone" value="" class="form-control" required="required">
                        </div>
                           <div class="form-group">
                          <label for="email"><span style="color:white">Email</span></label>
                          <input type="email" name="email" class="form-control" required="required">
                       </div>

                    <div class="form-group">
                      <label for="address"><span style="color:white">Address</span></label>
                      <input type="text" name="address" class="form-control" required="required">
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
      
     

        // Create the Insert Query to the Database
      $query = "INSERT INTO orders (foodname,foodprice,availability,Cusname,phone,email,address) VALUES ('$foodname','$foodprice','$availability','$Cusname','$phone','$email','$address');";

        $orders = mysqli_query($db, $query);

        if ( !$orders ){
          die("MySQL Error, Data Insert Failed");
        }
        else{
          header("Location: showfood.php");
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