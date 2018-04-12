<?php
	require('config.php');
	$id = $_POST["name"];

	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = " DELETE FROM Publisher WHERE Publisher.pub_name = '$id'";
	
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	}
	else {
		header("location: view_all_pub.php");
	}
	gamesClose($con)
?>