<?php
include('session.php');
$pub_name = $_GET['name'];
$db = gamesConnect();
$sql = "SELECT * FROM PUBLISHER WHERE PUBLISHER.pub_name = '$pub_name'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['pub_name'] ."</h1>";
echo "<h3>Region: " . $row['region'] . "</h3>";


echo "<div>Games published by " . $row['pub_name'] . ": </div>";

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
	WHERE GAME.pub_name ="'. $pub_name . '"';

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
echo '<a href=view_all_pub.php>View All Publishers </a>';
gamesClose($db);
?>