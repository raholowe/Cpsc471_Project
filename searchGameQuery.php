<?php
	include('session.php');
	$string = $_GET["search"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT ID,title FROM GAME WHERE GAME.title LIKE '%$string%'";
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
				$goto = "view_game_details.php?key=" . $row["ID"];
				echo "<td><a href=" . $goto . ">". $row['title'] ."</td></tr>";		
			}

			echo "</table border>";
		}
	}
	gamesClose($con);
	include('footer.php');

?>