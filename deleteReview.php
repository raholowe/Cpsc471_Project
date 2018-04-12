<?php
	require('config.php');
	$id = $_GET["ID"];
	$user = $_GET["username"];


	// Create connection
	$con=gamesConnect();
	// Check connection
	$sql = " DELETE FROM REVIEW WHERE REVIEW.game_id = '$id' AND REVIEW.username = \"$user\"";
	
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	} else {
		echo "Success!";
		echo "<a href=\"myProfile.php\"> Go back to your profile </a> ";
	}
	gamesClose($con)
?>