<?php
$connect = mysqli_connect("localhost", "root", "", "rms");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM revervation 
	WHERE uname LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' 
	OR phone LIKE '%".$search."%' 
	OR bdate LIKE '%".$search."%'
	OR email LIKE '%".$search."%'
	OR ptime LIKE '%".$search."%'
	OR psize LIKE '%".$search."%'
	OR srequest LIKE '%".$search."%'

	";
}
else
{
	$query = "SELECT * FROM revervation ORDER BY Bookingno";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="col-md-12">
					<table class="table table-dark">
						<tr>
						<th scope="col">Bookingno</th>
						<th scope="col">User name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Party Date</th>
						<th scope="col">Party Time</th>
						<th scope="col">Party Size</th>
						<th scope="col">Special Request</th>

							
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
			    <td>'.$row["Bookingno"].'</td>
			    <td>'.$row["uname"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["phone"].'</td>
				<td>'.$row["bdate"].'</td>
				<td>'.$row["ptime"].'</td>
				<td>'.$row["psize"].'</td>
				<td>'.$row["srequest"].'</td>
				
				
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

