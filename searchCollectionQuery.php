<?php
	require('config.php');
	$string = $_POST["search"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT ID,name FROM 'COLLECTION' WHERE name LIKE %'".$string."'%";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>