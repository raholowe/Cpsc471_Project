<?php
	include('session.php')
	$id= $_GET["ID"];
    $user= $_SESSION['login_user'];
	// Create connection
	$con=gamesConnect();
	// Check connection
	$sql = "INSERT INTO PLAYED_BY VALUES ('$id','$user')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
		header("location: myProfile.php");
	}
	

	gamesClose($con)
?>