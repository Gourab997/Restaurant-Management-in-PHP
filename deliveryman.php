<?php 
  ob_start();
  include "include/db.php"; 
?>
<?php
session_start();
 $n=$_SESSION['username'];
  if(isset($_SESSION['logged_in'])){
?>
<!doctype html>
<html lang="en">
  <head>
 
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2>All Order List</h2>
          </div>
          <div class="col-md-4">
        
          </div>
        </div>

    
  
        <div class="row">
          <div class="col-md-12">
            <table class="table table-dark">
              <li>Hello <?php echo $n  ?></li>
              <a href="logout.php" class="btn btn-success btn-sm">Log Out</a>
              <thead>
                <tr>
                  <th scope="col">orderno</th>
                  <th scope="col">foodname</th>
                  <th scope="col">foodprice</th>
                  <th scope="col">availability </th>
                  <th scope="col">Customer name </th>
                  <th scope="col">email</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">status</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                
                <?php
                  $myQuery = "SELECT * FROM orders";
                  $allUsers = mysqli_query($db, $myQuery);
                  $i = 0;
                  while ( $row = mysqli_fetch_assoc($allUsers) ) {
                      $id         = $row['orderno'];
                      $foodname   = $row['foodname'];
                      $foodprice   = $row['foodprice'];
                      $availability  = $row['availability'];
                      $Cusname   = $row['Cusname'];
                      $email      = $row['email'];
                      $phone      = $row['phone'];
                      $address    = $row['address'];
                      $status    = $row['status'];
                      $i++;
                      ?>
                      

                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                       
                      
                        <td><?php echo $foodname; ?></td>
                        <td><?php echo $foodprice; ?></td>
                        <td><?php echo $availability; ?></td>
                        <td><?php echo $Cusname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="updateOrder.php?update=<?php echo $id; ?>" class="btn btn-success btn-sm">Update</a>
                           
                          </div>
                        </td>
                      </tr>


                <?php  }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
  </body>
</html>
<?php
}
else
{
  include('login.php');
}
?>
<?php 
      ob_end_flush();
    ?>