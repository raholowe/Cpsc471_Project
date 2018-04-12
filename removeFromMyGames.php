<?php
	require('config.php');
	$gID= $_POST["ID"];
    $user= $_POST['username'];
	// Create connection
	$con=gamesConnect();
	// Check connection
	$sql = "DELETE FROM PLAYED_BY WHERE PLAYED_BY.game_id = '$gID' AND PLAYED_BY.username = \"$user\"";
	
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
		header('location: myProfile.php');
	}
	

	gamesClose($con)
?>