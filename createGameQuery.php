<?php
    require('config.php');
    $title= $_POST["title"];
    $copies= $_POST["copies_sold"];
    $date= $_POST["release_date"];
    $collection= $_POST["collection_name"];
    $dev= $_POST["dev_name"];
	$pub= $_POST["pub_name"];
	// Create connection
	$con=gamesConnect();
	// Check connection
	
	//check input
	
	if($copies == "") {
		$copies = "NULL";
	} else {
		$copies = "\"" . $copies . "\"";
	}
	if($collection == "") {
		$collection = "NULL";
	}
	if($date == "") {
		$date = "NULL";
	} else {
	 	$date = "\"" . $date . "\"";
	}
	
	$sql = "INSERT INTO GAME VALUES (NULL, '$title', $copies, $date, $collection, '$dev', '$pub')";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else {
		echo "Success!";
		echo "<a href=\"add.php\"> Go back </a> ";
	}

	gamesClose($con)
?>