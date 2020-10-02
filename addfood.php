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

	<?php
		// To show any Error
		$error = "";


		if ( isset($_POST['register']) ){
		  $foodname 	= $_POST['foodname'];
			$foodprice 		= $_POST['foodprice'];
			$availability 		= $_POST['availability'];
			$fcategory 	= $_POST['fcategory'];
			
			
				// Create the Insert Query to the Database
				$query = "INSERT INTO food (foodname,foodprice,availability,fcategory) VALUES ('$foodname','$foodprice','$availability','$fcategory');";

				$addfood = mysqli_query($db, $query);

				if ( !$addfood ){
					die("MySQL Error, Data Insert Failed");
				}
				

			}

	?>

  	<section>

  		<div class="container">
  			<div class="row">
           
  				<div class="col-md-12 text-center">
  					<h1>Add Food</h1>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-md-6 offset-md-3">
  					
  					<form action="" method="POST" enctype="multipart/form-data">
  						<div class="form-group">
  							<label for="foodname">Food Name</label>
  							<input type="text" name="foodname" class="form-control" required  ">
  						</div>

  						<div class="form-group">
  							<label for="foodprice">Price</label>
  							<input type="number" name="foodprice" class="form-control" required="required">
  						</div>

  					
  						<div class="form-group">
  							<label for="availability">Availability  :</label>
  							<input type="radio" id="Yes" name="availability" value="Yes">
                 <label for="availability">Yes</label><br>
       <input type="radio" id="No" name="availability" value="No">
             <label for="No">No</label>
  						</div>
        <div class="form-group">
  						Select Category:

             <select name="fcategory">
               <option value="Bangla">Bangla</option>
               <option value="Indian">Indian</option>
               <option value="Thai">Thai</option>
               <option value="Chinese">Chinese</option>
             </select>
           </div>

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