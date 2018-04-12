<?php
	require('config.php');
	$id= $_POST["game_id"];
    $user= $_POST["username"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `PLAYED_BY`(`game_id`, `username`) VALUES ('$id','$user')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>