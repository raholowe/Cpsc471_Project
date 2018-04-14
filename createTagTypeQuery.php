<?php
    include('session.php');
    $id= $_POST["game_id"];
    $user= $_POST["username"];

    $type= $_POST["type"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `TAG_TYPE`(`game_id`, `username`, `type`) VALUES ('$id', \"$user\",'$type')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {

		echo "Success!";
		echo '<a href="addTag.php?ID='. $id .'"> Add another tag </a>';
		$sql = "UPDATE Users SET community_score = community_score + 1 WHERE username = \"$user\" ";
		if(mysqli_query($con, $sql)) {
			echo "<br>Community Score increased by 1 for that tag!";
		}
	}
	gamesClose($con);
	include('footer.php');
?>