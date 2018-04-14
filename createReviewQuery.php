<?php
    require('config.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];
    $review= $_POST["text"];
    $score= $_POST["score"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `REVIEW` VALUES ('$id', '$user', '$review', '$score')";
	
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"myProfile.php\"> Go back to your profile </a> ";
		$sql = "UPDATE Users SET community_score = community_score + 10 WHERE username = \"$user\" ";
		if(mysqli_query($con, $sql)) {
			echo "<br>Community Score increased by 10 for that review!";
		}
	}

	gamesClose($con)
?>