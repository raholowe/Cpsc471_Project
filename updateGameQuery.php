<?php
    require('config.php');
    $ID= $_POST["ID"]
    $title= $_POST["title"];
    $copies= $_POST["copies_sold"];
    $date= $_POST["release_date"];
    $collection= $_POST["collection_id"];
    $dev= $_POST["dev_name"];
	$pub= $_POST["pub_name"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "UPDATE `GAME` SET  title= '$title', copies_sold='$copies',release_date ='$date', collection_id= '$collection', dev_name='$dev', pub_name='$pub' WHERE ID=$ID";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	}
	else
	echo "1 record updated";

	gamesClose($con)
?>