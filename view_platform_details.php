<?php
include('session.php');
$plat_name = $_GET['name'];
$db = gamesConnect();
$sql = "SELECT * FROM PLAYED_ON, GAME WHERE PLAYED_ON.platform = '$plat_name' AND GAME.ID = PLAYED_ON.ID";

$table = mysqli_query($db, $sql);

$count = mysqli_num_rows($table);

if($count == 0) {
	echo "This platform does not have any games in the database yet.";
} else {
	echo "<h1>Titles on the ". $plat_name ."</h1>";

	echo "<table border = '1'>
		<tr>
		<th>Title</th>
		<th>Release Date</th>
		<th>Copies Sold</th>

		</tr>";

	while($row = mysqli_fetch_array($table)) {
		echo "<tr>";
		$goto = "view_game_details.php?key=" . $row['ID'];
		echo "<td><a href=" . $goto . ">". $row['title'] ."</td>";
		echo "<td>" . $row['release_date'] . "</td>";
		echo "<td>" . $row['copies_sold'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
gamesClose($db);
include('footer.php');

?>