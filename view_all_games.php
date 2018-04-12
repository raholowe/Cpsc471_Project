<?php
include('session.php');
echo "<h1>All games</h1>";

$sortBy = $_GET['mode'];
$sortCol = $_GET['col'];
$arrow = "&uarr;";

$db = gamesConnect();
$name = $_SESSION[login_user];

$sql = "SELECT * FROM GAME ORDER BY GAME.". $sortCol . " " . $sortBy;;

$table = mysqli_query($db, $sql);

$count = mysqli_num_rows($table);

if($count == 0) {
	echo "The database is empty <br>";
} else {

	if($sortBy == DESC){
		$switchTo = "ASC";
		$arrow = "&darr;";

	} else {
		$switchTo = "DESC";
		$arrow = "&uarr;";
	}
	$goto = "view_all_games.php?mode=" . $switchTo;
	
	//	<th>Username <a href=" .$goto . "&col=username>(" . $sortBy .")</a></th>

	echo "<table border = '1'>
			<tr>
			<th>Title<a href=" .$goto . "&col=title> (" . $arrow .")</a></th>
			<th>Copies Sold<a href=" .$goto . "&col=copies_sold> (" . $arrow .")</a></th>
			<th>Release Date<a href=" .$goto . "&col=release_date> (" . $arrow .")</a></th>
			<th>Developer<a href=" .$goto . "&col=dev_name> (" . $arrow .")</a></th>
			<th>Publisher<a href=" .$goto . "&col=pub_name> (" . $arrow .")</a></th>
			<th>Franchise<a href=" .$goto . "&col=collection_id> (" . $arrow .")</a></th>
			<th>Tags</th>";

	if($_SESSION['permission'] == 1) {
		echo "<th> Delete </th>";
	}

	echo "</tr>";

	while($row = mysqli_fetch_array($table) )
	{
		echo "<tr>";

		$goto = "view_game_details.php?key=" . $row["ID"];
		echo "<td><a href=" . $goto . ">". $row['title'] ."</td>";

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

		$tag_query = "SELECT DISTINCT TAG_TYPE.type FROM TAG_TYPE WHERE TAG_TYPE.game_id = " . $row['ID'];
		$tag_table = mysqli_query($db, $tag_query);

		echo "<td>";
		while($tag_row = mysqli_fetch_array($tag_table)) {
			$goto = "view_gamesByTag.php?tag=" . $tag_row['type'];
			echo "<a href=" . $goto . ">";
			echo $tag_row['type'];
			echo "</a>, ";
		}
		echo "</td>";

		if($_SESSION['permission'] == 1) {
			echo "<td>";
		echo "<form action = \"deleteGameQuery.php\" method = \"post\">
				<input type=\"hidden\" name=\"title\" value=\"". $row['ID'] ."\">
				<button type=\"submit\" name=\"delete_game\" >Delete</button>
			</form>";
		echo "</td>";
		}

		echo "</tr>";
	}

}
echo "</table>";

gamesClose($db);

include('footer.php')
?>