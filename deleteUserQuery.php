<?php
	require('config.php');
	$username = $_POST["username"];

	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "DELETE FROM Users WHERE Users.username = '$username' ";
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	}
	else {
		header("location: deleteUser?mode=ASC&col=username");
	}
	gamesClose($con)
?>