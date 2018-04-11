<?php
include('session.php');
$dev_name = $_GET['name'];
echo $dev_name;
$db = gamesConnect();
$sql = "SELECT * FROM DEVELOPER WHERE DEVELOPER.dev_name = '$dev_name'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['dev_name'] ."</h1>";
echo "<h3>Region: " . $row['region'] . "</h3>";

echo "<div>Games developed by " . $row['dev_name'] . ": </div>";

echo "<table border = '1'>
	<tr>
	<th>Title</th>
	<th>Release Date</th>
	<th>Copies Sold</th>

	</tr>";


$sql = 
	'SELECT 
	    GAME.ID,GAME.title, GAME.release_date, GAME.copies_sold
	FROM
	    GAME
	WHERE GAME.dev_name ="'. $dev_name . '"';

$table = mysqli_query($db, $sql);

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