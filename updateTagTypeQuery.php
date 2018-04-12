<?php
    require('config.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];
    $type= $_POST["type"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "UPDATE `TAG_TYPE` SET `type`=[value-3] WHERE game_id='$id' AND username='$user'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record updated";

	gamesClose($con)
?>