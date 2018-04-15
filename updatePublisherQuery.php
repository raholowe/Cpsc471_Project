<?php
	require('config.php');
	$oldname = $_POST['oldname'];
	$pubName= $_POST["pub_name"];
    $region= $_POST["region"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `PUBLISHER` SET  pub_name='$pubName', region='$region' WHERE pub_name='$oldname'";
    
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	} else {
		gamesClose($con);
		header('location: view_all_pub.php');
	}

	
?>