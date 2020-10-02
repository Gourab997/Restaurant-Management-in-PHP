
<?php
  ob_start();
  include "include/db.php"; 
  ?>
  <?php
session_start();
 $n=$_SESSION['username'];
 if(isset($_SESSION['logged_in'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/Adminstyle.css">
  <style type="text/css">
        
        body{
            background-image:url(wooden-board-empty-table-top-blurred-background_1253-1584.jpg);
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
  <div id="" class="row container card-body " align="Center">
          <div class="col-md-8">
          </div>
          <div class="btn btn1">
            <a href="adduser.php" class="btn btn1">Register New User</a>
            <a href="userlist.php" class="btn btn2">View User list</a>
            <a href="userEdit.php" class="btn btn2">Update User</a>
              <a href="showbooking.php" class="btn btn2">View Booking</a>
              <a href="showOrderlist.php" class="btn btn2">View Order</a>
                <a href="logout.php" class="btn btn2">Log Out</a>
           
           <li>Hello <?php echo $n  ?></li>
          </div>
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
