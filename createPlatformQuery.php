<?php
	include('session.php');
	$platName= $_POST["plat_name"];
	$date = $_POST["release_date"];
    $company = $_POST["company"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO `PLATFORM` (`plat_name`, `release_date`, `company`) VALUES ('$platName', '$date', '$company')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	include('footer.php');
	} else {
		echo "Success!";
		echo "<a href=\"add.php\"> Go back </a> ";
		include('footer.php');
	}
	gamesClose($con)
?>