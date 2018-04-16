<?php
	include('session.php');
	$devName= $_POST["dev_name"];
	$lead = $_POST["lead"];
    $teamsize = $_POST["team_size"];
    $region= $_POST["region"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	if($lead == "") {
		$lead = "NULL";
	} else {
		$lead = "\"" . $lead . "\"";
	}
	if($teamsize == "") {
		$teamsize = "NULL";
	}
	if($region == "") {
		$region = "NULL";
	} else {
	 	$region = "\"" . $region . "\"";
	}

	$sql = "INSERT INTO `DEVELOPER` (`dev_name`, `lead`, `team_size`, `region`) VALUES ('$devName','$lead', '$teamsize', '$region')";
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