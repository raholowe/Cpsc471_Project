<?php
	require('config.php');
	$platName= $_POST["plat_name"];
	$date = $_POST["release_date"];
    $company = $_POST["company"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `PLATFORM` SET  plat_name='$platName', release_date='$date', company='$company' WHERE plat_name='$platName'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record updated";

	gamesClose($con)
?>