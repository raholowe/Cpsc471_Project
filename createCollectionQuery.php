<?php
    include('session.php');
    $id= $_POST["ID"];
    $name= $_POST["name"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `COLLECTION` VALUES (NULL, '$name')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"add.php\"> Go back </a> ";
		include('footer.php');
	}
	gamesClose($con);
?>