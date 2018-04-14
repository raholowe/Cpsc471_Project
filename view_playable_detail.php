<?php
include('session.php');
$char_name = $_GET['name'];
$db = gamesConnect();
$sql = "SELECT * FROM PLAYABLE_CHARACTER, GAME WHERE character_name = '$char_name' AND GAME.ID = PLAYABLE_CHARACTER.game_id";

$table = mysqli_query($db, $sql);

echo "<h1>". $char_name ."</h1>";

echo "<div>Appears in: </div>";

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

gamesClose($db);
include('footer.php');

?>