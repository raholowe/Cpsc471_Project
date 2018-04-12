<?php
	require('config.php');
	$id = $_POST["plat_name"];

	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = " DELETE FROM Platform WHERE Platform.plat_name = '$id'";
	
	if (!mysqli_query($con,$sql))
	{
		echo "failed";
	}
	else {
		header("location: view_all_platforms.php?mode=ASC&col=plat_name");
	}
	gamesClose($con)
?>