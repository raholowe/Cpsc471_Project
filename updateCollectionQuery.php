<?php
	require('config.php');
    $id= $_POST["ID"];
    $name= $_POST["name"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `COLLECTION` SET  name='$name' WHERE ID='$id'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record updated";

	gamesClose($con)
?>