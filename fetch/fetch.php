<?php
$connect = mysqli_connect("localhost", "root", "", "rms");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM users 
	WHERE username LIKE '%".$search."%'
	OR firstname LIKE '%".$search."%' 
	OR lastname LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' 
	OR phone LIKE '%".$search."%'
	OR address LIKE '%".$search."%'
	OR usertype LIKE '%".$search."%'
	OR join_date LIKE '%".$search."%'

	";
}
else
{
	$query = "
	SELECT * FROM users ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="col-md-12">
					<table class="table table-dark">
						<tr>
						<th>id</th>
							<th scope="col">First Name</th>
							<th scope="col">Last Name</th>
							<th scope="col">Username</th>
							<th scope="col">Email Address</th>
							<th scope="col">Address</th>
							<th scope="col">Phone Number</th>
							<th scope="col">Usertype</th>
							<th scope="col">Join Date</th>
							
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
			    <td>'.$row["id"].'</td>
			    <td>'.$row["firstname"].'</td>
				<td>'.$row["lastname"].'</td>
				<td>'.$row["username"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["address"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["usertype"].'</td>
				<td>'.$row["join_date"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

?>

