<?php
	require('config.php');
	$devName= $_POST["dev_name"];
	$lead = $_POST["lead"];
    $teamsize = $_POST["team_size"];
    $region= $_POST["region"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `DEVELOPER` SET  dev_name= '$devName', lead='$lead',team_size ='$teamsize', region= '$region' WHERE dev_name='$devName'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record updated";

	gamesClose($con)
?>