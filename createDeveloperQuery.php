<?php
	require('config.php');
	$devName= $_POST["dev_name"];
	$lead = $_POST["lead"];
    $teamsize = $_POST["team_size"];
    $region= $_POST["region"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `DEVELOPER` (`dev_name`, `lead`, `team_size`, `region`) VALUES ('$devName','$lead', '$teamsize', '$region')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>