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

$sendName = urlencode($row['dev_name']);
$goto = "view_dev_details.php?name=" . $sendName;
echo "<td><a href=" . $goto . ">". $row['dev_name'] ."</td>";

$sendName = urlencode($row['pub_name']);
$goto = "view_pub_details.php?name=" . $sendName;
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
echo "</table>";

echo "Tagged with: ";

$tag_query = "SELECT DISTINCT TAG_TYPE.type FROM TAG_TYPE WHERE TAG_TYPE.game_id = " . $row['ID'];
$tag_table = mysqli_query($db, $tag_query);

while($tag_row = mysqli_fetch_array($tag_table)) {
	$goto = "view_gamesByTag.php?tag=" . $tag_row['type'];
	echo "<a href=" . $goto . ">";
	echo $tag_row['type'];
	echo "</a>, ";
}

gamesClose($db);
include('footer.php');
?>

