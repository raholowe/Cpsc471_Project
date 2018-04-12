<?php
include('session.php');
$gameID = $_GET['key'];
$db = gamesConnect();
$sql = "SELECT * FROM GAME WHERE GAME.ID = '$gameID'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['title'] ."</h1>";

$name = $_SESSION[login_user];

$doesExist = " SELECT game_id from PLAYED_BY WHERE PLAYED_BY.username = '$name' AND PLAYED_BY.game_id = '$gameID' ";
$bool = mysqli_query($db,$doesExist);
if( mysqli_num_rows($bool) == 0 ){
	$goto = "addToMyGames.php?ID=".$gameID . "&username=".$name;
	echo "<h4> <a href=".$goto.">+ Add to My Games</a></h4>";
} else {
	$goto = "myProfile.php";
	echo "<h4> <a href=".$goto.">In your games </a></h4>";

}

$doesExist = " SELECT game_id from REVIEW WHERE REVIEW.username = '$name' AND REVIEW.game_id = '$gameID' ";
$bool = mysqli_query($db,$doesExist);
if( mysqli_num_rows($bool) == 0 ){
	$goto = "writeReview.php?ID=".$gameID . "&username=" . $name;
	echo "<h4> <a href=".$goto.">Review this game</a></h4>";
} else {
	$goto = "editReview.php?ID=".$gameID . "&username=" . $name;
	echo "<h4> <a href=".$goto.">Edit your review</a></h4>";
}

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

if($franchise = mysqli_query($db, $fQ)) {
	$franRow = mysqli_fetch_array($franchise);
	$goto = "view_franchise_details.php?ID=" . $collect;
	echo "<td><a href=". $goto . ">" . $franRow['name'] . "</td>";
} else {
	echo "<td></td>";
}



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

