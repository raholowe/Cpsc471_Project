<?php
    require('config.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];
    $type= $_POST["type"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `TAG_TYPE`(`game_id`, `username`, `type`) VALUES ('$id','$user','$type')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>