<?php
	require('config.php');
	$name = $_POST["character_name"];
	$game = $_POST["game_id"];
	$age = $_POST["age"];
	$type = $_POST["type"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `PLAYABLECHARACTER` SET  character_name='$name', game_id='$game', age='$age', type='$type' WHERE name='$name' AND game_id='$game'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>