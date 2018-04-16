<?php
	include('session.php');
    $id= $_POST["ID"];
    $name= $_POST["name"];
	// Create connection
	$con=gamesConnect();
	// Check connection

    $sql = "UPDATE `COLLECTION` SET  name='$name' WHERE ID='$id'";
	if (!mysqli_query($con,$sql))
	{
	die('Error: ' . mysqli_error($con));
	} else {
		echo "Success!";
		echo "<a href=\"view_all_franchise.php\"> Go back </a> ";
		include('footer.php');
	}
	gamesClose($con);
?>