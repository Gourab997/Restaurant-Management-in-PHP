<?php 
  ob_start();
  include "include/db.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
 
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
 
  

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2>All Food List</h2>
          </div>
          <div class="col-md-4">
        
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Food name</th>
                  <th scope="col">Food price</th>
                  <th scope="col">Availability</th>
                  <th scope="col">Category</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php
                  $myQuery = "SELECT * FROM food";
                  $allUsers = mysqli_query($db, $myQuery);
                  $i = 0;
                  while ( $row = mysqli_fetch_assoc($allUsers) ) {
                      $id         = $row['id'];
                      $foodname   = $row['foodname'];
                      $foodprice   = $row['foodprice'];
                      $availability  = $row['availability'];
                      $fcategory   = $row['fcategory'];
                     
                    $i++;
                      ?>
                      

                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                       
                       <td><?php echo $foodname; ?></td>
                        <td><?php echo $foodprice; ?></td>
                        <td><?php echo $availability; ?></td>
                        <td><?php echo $fcategory; ?></td>
                     
                        <td>
                          <div class="btn-group">
                            <a href="orderfood.php?order=<?php echo $id; ?>" class="btn btn-success btn-sm">Order</a>
                           
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
    <?php 
      ob_end_flush();
    ?>
  </body>
</html>