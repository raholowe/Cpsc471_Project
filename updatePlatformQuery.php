<?php
	include('session.php');
	$platName= $_POST["plat_name"];
	$oldName = $_POST['oldname'];
	$date = $_POST["release_date"];
    $company = $_POST["company"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE PLATFORM SET  plat_name='$platName', release_date='$date', company='$company' WHERE plat_name='$oldName'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"view_all_platforms.php?mode=DESC&col=release_date\"> Go back </a> ";
		include('footer.php');
	}
	
	gamesClose($con);
?>