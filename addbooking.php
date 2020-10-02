<?php 
	ob_start();
	include "include/db.php"; 
?>
<?php
if(isset($_POST["register"])){
	$myInput=$_POST["uname"];
	if(preg_match("/^[a-zA-Z ]*$/", $myInput))
	{

	}
	else
	{
		echo "Invalid name";
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
	$myInput=$_POST["psize"];
	if(is_numeric($myInput))
	{

	}
	else
	{
		echo "Invalid Keyword";
	}
}
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

	<?php
		// To show any Error
		$error = "";


		if ( isset($_POST['register']) ){
		  $uname 	= $_POST['uname'];
			$email 		= $_POST['email'];
			$phone 		= $_POST['phone'];
			$bdate 	= $_POST['bdate'];
			$ptime 	= $_POST['ptime'];
      $psize    = $_POST['psize'];
      $srequest     = $_POST['srequest'];
			

	
				
				// Create the Insert Query to the Database
				$query = "INSERT INTO revervation (uname,email,phone,bdate,ptime, psize, srequest) VALUES ('$uname','$email','$phone','$bdate','$ptime', '$psize', '$srequest');";

				$addbooking = mysqli_query($db, $query);

				if ( !$addbooking ){
					die("MySQL Error, Data Insert Failed");
				}
        else{
          header("Location: index.php");
        }
				

			}

	?>

  	<section>

  		<div class="container">
  			<div class="row">
           
  				<div class="col-md-12 text-center">
  					<h1>Make a Reservation</h1>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6 offset-md-3">
  					
  					<form action="" method="POST" enctype="multipart/form-data">
  						<div class="form-group">
  							<label for="uname">Name</label>
  							<input type="text" name="uname" class="form-control" required pattern="[a-zA-Z]{3,20}" title="Invalid formet ">
  						
  						</div>

  						<div class="form-group">
  							<label for="email">Email</label>
  							<input type="email" name="email" class="form-control" required="required">
  						</div>

  					
  					<div class="form-group">
  							<label for="phone">Phone No.</label>
  							<input type="text" name="phone" class="form-control" required pattern="[0-9]{11}" title="invalid mobile number">
  					
                     </div>
  						<div class="form-group">
  							<label for="bdate">Date</label>
  							<input type="date" name="bdate" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="ptime">Time</label>
  							<input type="time" name="ptime" class="form-control" required="required">
  						</div>

  						<div class="form-group">
  							<label for="psize">Party Size</label>
  							<input type="number" name="psize" class="form-control" required pattern="[0-9]{3}" title="Party Size Invalid">
  						</div>
              <div class="form-group">
              <label for="srequest">Special request</label>

              
              <textarea id="srequest" name="srequest" rows="4" cols="50"></textarea>
                </div>
  						<div class="form-group">

  							<input type="submit" name="register" class="btn btn-primary" value="submit">
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