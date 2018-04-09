<?php
include('session.php');
$gameID = $_GET['key'];
$db = gamesConnect();
$sql = "SELECT * FROM GAME WHERE GAME.ID = '$gameID'";

$table = mysqli_query($db, $sql);
$columns = mysqli_num_fields($table);

echo "<table border = '1'>
<tr>
<th>Title</th>
<th>Copies Sold</th>
<th>Release Date</th>
<th>Developer</th>
<th>Publisher</th>
<th>Franchise</th>";

while($row = mysqli_fetch_array($table)) {
	echo "<tr>";
	echo "<td>" . $row['title'] . "</td>";
	echo "<td>" . $row['copies_sold'] . "</td>";
	echo "<td>" . $row['release_date'] . "</td>";
	echo "<td>" . $row['dev_name'] . "</td>";
	echo "<td>" . $row['pub_name'] . "</td>";

	$collect = $row['collection_id'];

	$fQ = "SELECT 
			    COLLECTION.name
			FROM
			    COLLECTION
			WHERE COLLECTION.ID = " .$collect;

	$franchise = mysqli_query($db, $fQ);
	$franRow = mysqli_fetch_array($franchise);

	echo "<td>" . $franRow['name'] . "</td>";


	echo "</tr>";

}

gamesClose($db);
?>

