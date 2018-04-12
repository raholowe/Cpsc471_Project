<?php
	require('config.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];
    $review= $_POST["text"];
    $score= $_POST["score"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `REVIEW` SET  text='$review', score='$score' WHERE game_id='$id' AND username='$user'";
    
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"myProfile.php\"> Go back to your profile </a> ";
	}

	gamesClose($con)
?>