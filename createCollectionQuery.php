<?php
    require('config.php');
    $id= $_POST["ID"];
    $name= $_POST["name"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `COLLECTION` VALUES ('$id', '$name')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>