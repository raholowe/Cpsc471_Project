<?php
	require('config.php');
	$id = $_POST["dev_name"];

	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = " DELETE FROM Developer WHERE Developer.dev_name = '$id'";
	
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	}
	else {
		header("location: view_all_dev.php");
	}
	gamesClose($con)
?>