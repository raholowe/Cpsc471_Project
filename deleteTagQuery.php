<?php
	require('config.php');
	$gID= $_POST["ID"];
    $user= $_POST['username'];
    $type = $_POST['type'];
	// Create connection
	$con=gamesConnect();
	// Check connection
	$sql = "DELETE FROM TAG_TYPE WHERE TAG_TYPE.game_id = '$gID' AND TAG_TYPE.username = \"$user\" AND TAG_TYPE.type = '$type'";
	
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
		$goto = "view_game_details.php?key=" . $gID;
		header('location:'. $goto);
	}
	

	gamesClose($con)
?>