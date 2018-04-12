<?php
	require('config.php');
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$admin=$_POST["isAdmin"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `USERS` SET  email= '$email', password='$password', isAdmin='$admin'  WHERE username='$username'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record updated";

	gamesClose($con)
?>