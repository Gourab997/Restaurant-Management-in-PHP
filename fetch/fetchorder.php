<?php
$connect = mysqli_connect("localhost", "root", "", "rms");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM orders 
	WHERE foodname LIKE '%".$search."%' 
	OR foodprice LIKE '%".$search."%' 
	OR availability LIKE '%".$search."%' 
	OR Cusname LIKE '%".$search."%'
	OR email LIKE '%".$search."%'
	OR phone LIKE '%".$search."%'
	OR address LIKE '%".$search."%'
	OR status LIKE '%".$search."%'

	";
}
else
{
	$query = "
	SELECT * FROM orders ORDER BY orderno";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="col-md-12">
					<table class="table table-dark">
						<tr>
						<th scope="col">orderno</th>
							<th scope="col">foodname</th>
							<th scope="col">foodprice</th>
							<th scope="col">availability</th>
							<th scope="col">Customer name</th>
							<th scope="col">email</th>
							<th scope="col">Phone Number</th>
							<th scope="col">address</th>
							<th scope="col">status</th>
							
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
			    <td>'.$row["orderno"].'</td>
			    <td>'.$row["foodname"].'</td>
				<td>'.$row["foodprice"].'</td>
				<td>'.$row["availability"].'</td>
				<td>'.$row["Cusname"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["address"].'</td>
				<td>'.$row["status"].'</td>
				
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

