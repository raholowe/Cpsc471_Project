<?php
	include('session.php');
	$string = $_GET["search"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT * FROM COLLECTION WHERE COLLECTION.name LIKE '%$string%'";
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	} else {
		echo "<h2>You searched for '" . $string ."' </h2>";
		$table = mysqli_query($con,$sql);
		if(mysqli_num_rows($table) == 0) {
			echo "No results!";
		} else {
			echo "<table border = '1'>";

			while($row = mysqli_fetch_array($table) )
			{
				echo "<tr>";
				$goto = "view_franchise_details.php?ID=" . $row['ID'];
				echo "<td><a href=" . $goto . ">". $row['name'] ."</td></tr>";		
			}

			echo "</table border>";
		}
	}
	gamesClose($con);
	include('footer.php');

?>