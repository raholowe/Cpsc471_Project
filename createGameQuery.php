<?php
    require('config.php');
    $title= $_POST["title"];
    $copies= $_POST["copies_sold"];
    $date= $_POST["release_date"];
    $collection= $_POST["collection_id"];
    $dev= $_POST["dev_name"];
	$pub= $_POST["pub_name"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `GAME` VALUES (NUll, '$title', '$copies', '$date', '$collection', '$dev', '$pub')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>