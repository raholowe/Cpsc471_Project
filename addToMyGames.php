<?php
	include('session.php');
	$gID= $_GET["ID"];
    $user= $_SESSION['login_user'];
	// Create connection
	$con=gamesConnect();
	// Check connection
	$sql = "INSERT INTO PLAYED_BY VALUES ('$gID','$user')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
		echo "Success! Go to <a  href=\"myProfile.php\">your games</a>";
	}
	

	gamesClose($con)
?>