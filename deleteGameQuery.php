<?php
	require('config.php');
	$id = $_POST["ID"];

	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = " DELETE FROM GAME WHERE GAME.ID = '$id'";
	
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	}
	else {
		header("location: view_all_games.php?mode=ASC&col=title");
	}
	gamesClose($con)
?>