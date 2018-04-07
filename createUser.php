<?php
require('config.php')
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$time = time();
	$date=  date('Y-m-d', $time) ;
	echo $name. "<br>". $email. "<br>";
	// Create connection
	$con=gamesConnect();
// Check connection

$sql = "INSERT INTO USER (username, join_date, community_score, password, email) VALUES ('$name','$date',NUll,'$password','$email')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
echo "1 record added";

gamesClose($con)
?>