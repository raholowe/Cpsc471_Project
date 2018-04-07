<?php
    require('config.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];
    $review= $_POST["text"];
    $score= $_POST["score"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `REVIEW` VALUES ('$id', '$user', '$review', '$score')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>