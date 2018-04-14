<?php
	include('session.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];
    $old= $_POST["oldType"];
    $new= $_POST['newType'];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "UPDATE TAG_TYPE SET type= '$new' WHERE game_id='$id' AND username='$user' AND type = '$old'";
	
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"myProfile.php\"> Go back to your profile </a> ";
	}
	gamesClose($con);
	include('footer.php');
?>