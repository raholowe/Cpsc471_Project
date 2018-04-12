<?php
	require('config.php');
	$string = $_POST["search"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT * FROM 'TAG_TYPE' WHERE type LIKE %'".$string."'%";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>