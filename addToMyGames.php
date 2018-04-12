<?php
	require('config.php');
	$gID= $_GET["ID"];
    $user= $_GET['username'];
	// Create connection
	$con=gamesConnect();
	// Check connection
	$sql = "INSERT INTO PLAYED_BY VALUES ('$gID','$user')";
	
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
		$goto = "view_game_details.php?key=" . $gID;
		header('location:' . $goto);
	}
	

	gamesClose($con)
?>