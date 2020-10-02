<?php 
	ob_start();
	include "include/db.php"; 
 ?>
<?php
if(isset($_POST["register"])){
  $myInput=$_POST["fname"];
  if(preg_match("/^[a-zA-Z ]*$/", $myInput))
  {

  }
  else
  {
    echo "First name";
  }
}
if(isset($_POST["register"])){
  $myInput=$_POST["lname"];
  if(preg_match("/^[a-zA-Z ]*$/", $myInput))
  {

  }
  else
  {
    echo "Invalid Last name";
  }
}
if(isset($_POST["register"])){
  $myInput=$_POST["email"];
  if(filter_var($myInput,FILTER_VALIDATE_EMAIL))
  {

  }
  else
  {
    echo "Invalid Email";
  }
}
if(isset($_POST["register"])){
  $myInput=$_POST["phone"];
  if(strlen($myInput)==11)
  {

  }
  else
  {
    echo "Invalid phone";
  }
}
if(isset($_POST["register"])){
  $myInput=$_POST["username"];
  if(strlen($myInput)<=8)
  {

  }
  else
  {
    echo "<span style='color: red'>Username should be more than 8 characters</span>";
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add User</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">   

    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>

	<?php
		// To show any Error
		$error = "";


		if ( isset($_POST['register']) ){
			$username 	= $_POST['username'];
			$fname 		= $_POST['fname'];
			$lname 		= $_POST['lname'];
			$email 		= $_POST['email'];
			$phone 		= $_POST['phone'];
			$address 	= $_POST['address'];
			$password 	= $_POST['password'];
			$cpassword 	= $_POST['cpassword'];
			$usertype 		= $_POST['usertype'];

			if( $password != $cpassword ){
				$error = '<div class="alert alert-danger">Password Doesn\'t Match</div>';
			}
			else{
				$hassedPassword = sha1($password);
				
				// Create the Insert Query to the Database
				$query = "INSERT INTO users (username, password, firstname, lastname, email, phone, address,usertype, join_date) VALUES ('$username', '$hassedPassword', '$fname', '$lname', '$email', '$phone', '$address', '$usertype',now())";

				$adduser = mysqli_query($db, $query);

				if ( !$adduser ){
					die("MySQL Error, Data Insert Failed");
				}
				else{
					header("Location: admin.php");
				}

			}
		}

	?>

  	<section>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12 text-center">
  					<h1>Insert New User Data</h1>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6 offset-md-3">
  					
  					<form action="" method="POST" enctype="multipart/form-data">
  						<div class="form-group">
  							<label for="username">Username</label>
  							<input type="text" name="username" class="form-control" required ">
  						</div>

  						<div class="form-group">
  							<label for="fname">First Name</label>
  							<input type="text" name="fname" class="form-control" required pattern="[a-zA-Z]{3,14}" title="Invalid formet ">
  						</div>
              
             

  						<div class="form-group">
  							<label for="lname">Last Name</label>
  							<input type="text" name="lname" class="form-control" required pattern="[a-zA-Z]{3,14}" title="Invalid formet ">
  						</div>

  						<div class="form-group">
  							<label for="email">Email</label>
  							<input type="email" name="email" class="form-control" required="required">
  						</div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required="required">
              </div>

              <div class="form-group">
                <label for="cPassword">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" required="required">
              </div>
  						<div class="form-group">
  							<label for="phone">Phone No.</label>
  							<input type="text" name="phone" class="form-control" required pattern="[0-9]{11}" title="invalid mobile number">
  						</div>

  						<div class="form-group">
  							<label for="address">Address</label>
  							<input type="text" name="address" class="form-control" required="required">
  						</div>

  						
                         <div class="form-group">
                           Select user type: <select name="usertype">
       	 	 <option value="admin">Admin</option>
       	 	 <option value="productmanager">Product manager</option>
       	 	 <option value="deliveryman">Delivery Man</option>
             </select>
                          </div>

  						<div class="form-group">
  							<input type="submit" name="register" class="btn btn-primary" value="Register">
  						</div>

  					</form>

  					<div class="form-group">
  						<?php echo $error; ?>
  					</div>

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