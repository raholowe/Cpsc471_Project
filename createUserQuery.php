<?php
	require('config.php');
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$time = time();
	$date=  date('Y-m-d', $time) ;
	//echo $username. "<br>". $email. "<br>";
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO Users (username, join_date, community_score, password, email, isAdmin) VALUES ('$username','$date', '0' ,'$password','$email','0')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
	$_SESSION['login_user'] = $username;
	header("location: welcome.php");
	}
	gamesClose($con)
?>