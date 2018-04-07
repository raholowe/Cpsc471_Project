<?php
	require('config.php');
	$name = $_POST["character_name"];
	$game = $_POST["game_id"];
	$age = $_POST["age"];
	$type = $_POST["type"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO PLAYABLECHARACTER VALUES ('$name','$game', '$age', '$type')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>