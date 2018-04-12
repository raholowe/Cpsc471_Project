<?php
	require('config.php');
	$string = $_POST["search"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT * FROM 'PLAYABLE_CHARACTER' WHERE character_name LIKE %'".$string."'%";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>