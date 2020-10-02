<?php

	$db = mysqli_connect('localhost', 'root', '', 'rms');


	if ( $db ){
		//echo "Database Connected";
	}
	else{
		echo "Database Connection Faild";
	}


?>