<?php
include('session.php');
echo "<h1>All games</h1>";

$db = gamesConnect();
$name = $_SESSION[login_user];

$sql = "SELECT * FROM GAME";

$table = mysqli_query($db, $sql);

$count = mysqli_num_rows($table);

if($count == 0) {
	echo "The database is empty <br>";
} else {
	echo "<table border = '1'>
			<tr>
			<th>Title</th>
			<th>Copies Sold</th>
			<th>Release Date</th>
			<th>Developer</th>
			<th>Publisher</th>
			<th>Franchise</th>
			</tr>";

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
		echo "</tr>";
	}

}
echo "</table>";
gamesClose($db);

include('footer.php')
?>