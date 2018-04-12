<?php	
	include('session.php');
	$string = $_GET["search"];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT DISTINCT PLAYABLE_CHARACTER.character_name, PLAYABLE_CHARACTER.type FROM PLAYABLE_CHARACTER";
	
	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	} else {
		
		$table = mysqli_query($con,$sql);
		if(mysqli_num_rows($table) == 0) {
			echo "No characters!";
		} else {
			echo "<table border = '1'>";

			while($row = mysqli_fetch_array($table) )
			{
				echo "<tr>";
				$goto = "view_playable_detail.php?name=" . $row['character_name'];
				echo "<td><a href=" . $goto . ">". $row['character_name'] ."</a></td>";	
				echo "<td>". $row['type'] ."</td></tr>";		
	
			}

			echo "</table border>";
		}
	}
	gamesClose($con);
	include('footer.php');
?>