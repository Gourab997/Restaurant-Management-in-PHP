<?php 
  ob_start();
  include "include/db.php"; 
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
            <h2>All User List</h2>
          </div>
          <div class="col-md-4">
        
          </div>
        </div>

    
  
        <div class="row">
          <div class="col-md-12">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Usertype</th>
                  <th scope="col">Join Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
                  $myQuery = "SELECT * FROM users";
                  $allUsers = mysqli_query($db, $myQuery);
                  $i = 0;
                  while ( $row = mysqli_fetch_assoc($allUsers) ) {
                      $id         = $row['id'];
                      $username   = $row['username'];
                      $password   = $row['password'];
                      $firstname  = $row['firstname'];
                      $lastname   = $row['lastname'];
                      $email      = $row['email'];
                      $phone      = $row['phone'];
                      $address    = $row['address'];
                      $usertype   = $row['usertype'];
                      $join_date  = $row['join_date']; 
                      $i++;
                      ?>
                      

                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                       
                       <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $usertype; ?></td>
                        <td><?php echo $join_date; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="updateUser.php?update=<?php echo $id; ?>" class="btn btn-success btn-sm">Update</a>
                            <a href="userEdit.php?delete=<?php echo $id; ?>" class="btn btn-danger btn-sm">Delete</a>
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

    <?php

      if ( isset($_GET['delete']) ){
        $user = $_GET['delete'];

        $query = "DELETE FROM users WHERE id='$user' ";

        $deleteStd = mysqli_query($db, $query);

        if ( !$deleteStd ){
          die("MySQL Error, Data Insert Failed");
        }
        else{
          header("Location: userEdit.php");
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

