<?php
include('session.php');
$gameID = $_GET['key'];
$db = gamesConnect();
$sql = "SELECT * FROM GAME WHERE GAME.ID = '$gameID'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['title'] ."</h1>";

echo "<table border = '1'>
<tr>
<th>Copies Sold</th>
<th>Release Date</th>
<th>Developer</th>
<th>Publisher</th>
<th>Franchise</th>
</tr>";

echo "<tr>";
echo "<td>" . $row['copies_sold'] . "</td>";
echo "<td>" . $row['release_date'] . "</td>";
$goto = "view_dev_details.php?name=" . $row['dev_name'];
echo "<td><a href=" . $goto . ">". $row['dev_name'] ."</td>";
$goto = "view_pub_details.php?name=" . $row['pub_name'];
echo "<td><a href=" . $goto . ">".$row['pub_name'] . "</td>";

$collect = $row['collection_id'];

$fQ = "SELECT 
		    COLLECTION.name
		FROM
		    COLLECTION
		WHERE COLLECTION.ID = " .$collect;

$franchise = mysqli_query($db, $fQ);
$franRow = mysqli_fetch_array($franchise);

$goto = "view_franchise_details.php?ID=" . $collect;
echo "<td><a href=". $goto . ">" . $franRow['name'] . "</td>";


echo "</tr>";



gamesClose($db);
?>

