<?php
	require('config.php');
	$pubName= $_POST["pub_name"];
    $region= $_POST["region"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `PUBLISHER` (`pub_name`, `region`) VALUES ('$pubName', '$region')";
	if($region == "") {
		$sql = "INSERT INTO `PUBLISHER` (`pub_name`, `region`) VALUES ('$pubName', NULL)";
	} else {
	 	$region = "\"" . $region . "\"";
	}

	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"add.php\"> Go back </a> ";
	}
	gamesClose($con)
?>