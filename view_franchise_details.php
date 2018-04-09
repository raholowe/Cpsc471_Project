<?php
include('session.php');
$frID = $_GET['ID'];
$db = gamesConnect();
$sql = "SELECT * FROM COLLECTION WHERE COLLECTION.ID = '$frID'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['name'] ."</h1>";
echo "<div>Games in the " . $row['name'] . " franchise: </div>";

echo "<table border = '1'>
	<tr>
	<th>Title</th>
	<th>Release Date</th>
	</tr>";


$sql = 
	"SELECT 
	    GAME.ID,GAME.title, GAME.release_date
	FROM
	    GAME
	WHERE GAME.collection_id =" . $frID;

$table = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($table)) {

echo "<tr>";
$goto = "view_game_details.php?key=" . $row['ID'];
echo "<td><a href=" . $goto . ">". $row['title'] ."</td>";
echo "<td>" . $row['release_date'] . "</td>";

}

//echo "<h2>Region: " . $row['region'] . "</h2>";
?>