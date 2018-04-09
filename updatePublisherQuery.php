<?php
	require('config.php');
	$pubName= $_POST["pub_name"];
    $region= $_POST["region"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `PUBLISHER` SET  pub_name='$pubname', region='$region' WHERE pub_name='$pubname'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record added";

	gamesClose($con)
?>