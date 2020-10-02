<?php 
	

	include "include/db.php"; 
	ob_start();
	session_start();
	
?>

<html>
<head>
	 <meta charset="utf-8">
	<title>User login</title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		// To show any Error
		$error = "";
     
    
		if ( isset($_POST['Login']) ){
		  $u_name 	= $_POST['u_name'];
			$u_pass 		= $_POST['u_pass'];
			$hassedpass = sha1($u_pass);
			$usertype 		= $_POST['usertype'];



			

	
				
				// Create the Insert Query to the Database
				$query = "SELECT * FROM users WHERE username= '$u_name' and  usertype = '$usertype'";

				$login = mysqli_query($db, $query);
				

        if( !$login ){
          die("ERROR" . mysqli_error($db) );
        }
        else{

          while($row= mysqli_fetch_array($login)){
                   $get_username   = $row['username'];
            $get_password   = $row['password'];

				}
			}
				




				if($get_username == $u_name && $get_password == $hassedpass){
				
				   if ( $login )
				  {
					while($row=mysqli_fetch_array($login)){
						echo'<script type="text/javascript">alert("you are login successfully and you logined as ' .$row['usertype'].'")</script>';
					}

					if($usertype=="admin"){

						header("location:admin.php");
							$_SESSION['username']=$get_username;

                          $_SESSION['logged_in']='1';
                          include('admin.php');
					

						?>

						<script type="text/javascript">
							window.location.href="admin.php"</script>
						<?php
					
                   }
					elseif($usertype=="productmanager"){ 
						header("location:productmanager.php");
							$_SESSION['username']=$get_username;

                         $_SESSION['logged_in']='1';
                          include('productmanager.php');
						?>
						   <script type="text/javascript">
							window.location.href="productmanager.php"</script>
					     <?php
				
					}
						 
					      
				  else{

				  	header("location:deliveryman.php");
							$_SESSION['username']=$get_username;
						 $_SESSION['logged_in']='1';
                          include('deliveryman.php');	
                      ?>
						   <script type="text/javascript">
							window.location.href="deliveryman.php"</script>
					     <?php
					 }

				}
			}
			else{
				echo "Failed to login";
			}

			}	
				
			
				

			

	?>
	 <div class="loginbox">
    <img src="avatar.png" class="avatar">
	<form action="login.php" method="post">
    <table>
    	<tr>
    	 <td><input type="text" name="u_name" value="" placeholder="Username" required></td>
        </tr>
       <tr>
       <td><input type="password" name="u_pass" value="" placeholder="password" required><br></td>
      </tr>
       <tr>
       	 <td>
       	 	Select user type: <select name="usertype">
       	 	 <option value="admin">Admin</option>
       	 	 <option value="productmanager">Product manager</option>
       	 	 <option value="deliveryman">Delivery Man</option>
             </select>
         </td>
        </tr>
        <tr>
        	<td><input type="submit" name="Login" value="Login"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>


<?php
ob_end_flush();
?>