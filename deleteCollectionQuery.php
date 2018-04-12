<?php
	require('config.php');
	$id = $_POST["ID"];

	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = " DELETE FROM Collection WHERE Collection.ID = '$id'";
	
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	}
	else {
		header("location: view_all_franchise.php");
	}
	gamesClose($con)
?>