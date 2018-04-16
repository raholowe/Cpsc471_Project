<?php
	include('session.php');
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$isAdmin = $_POST['isAdmin'];
	$cScore = $_POST['community_score'];
	$time = time();
	$date=  date('Y-m-d', $time) ;
	//echo $username. "<br>". $email. "<br>";
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "INSERT INTO Users (username, join_date, community_score, password, email,isAdmin) VALUES ('$username','$date', '$cScore' ,'$password','$email', $isAdmin)";
	if (!mysqli_query($con,$sql))
	{
		echo mysqli_error($con);
		echo "<a href=\"add.php\"> Go back </a> ";
		include('footer.php');
	}
	else {
		echo "Success!";
		echo "<a href=\"add.php\"> Go back </a> ";
		include('footer.php');
	
	}
	gamesClose($con)
?>