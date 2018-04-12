<?php
include('session.php');
echo "<h1>Franchises</h1>";

$db = gamesConnect();
$name = $_SESSION[login_user];

$sql = "SELECT * FROM COLLECTION";

$table = mysqli_query($db, $sql);

$count = mysqli_num_rows($table);

if($count == 0) {
	echo "There are no franchises!<br>";
} else {
	echo "<table border = '1'>
			<tr>
			<th>Name</th>
			<th>Number of Games</th>";
	if($_SESSION['permission'] == 1) {
		echo "<th> Delete </th>";
		echo "<th> Edit </th>";
	}
	echo "</tr>";

	while($row = mysqli_fetch_array($table) )
	{
		echo "<tr>";

		$goto = "view_franchise_details.php?ID=" . $row['ID'];
		echo "<td><a href=" . $goto . ">". $row['name'] ."</td>";

		$collect = $row['ID'];

		$fQ = "SELECT 
				    COUNT(*) as total
				FROM
				    GAME
				WHERE GAME.collection_id =".$collect;


		$result = mysqli_query($db, $fQ);
		$data = mysqli_fetch_assoc($result);
		echo "<td>" . $data['total'] . "</td>";
		if($_SESSION['permission'] == 1) {
		
		echo "<td>";
		echo "<form action = \"deleteCollectionQuery.php\" method = \"post\">
				<input type=\"hidden\" name=\"ID\" value=\"" . $row['ID'] ."\">
				<button type=\"submit\" name=\"delete_collection\" >Delete</button>
			</form>";
		echo "</td>";

			echo "<td>";
		echo "<form action = \"editCollection.php\" method = \"post\">
				<input type=\"hidden\" name=\"ID\" value=\"". $row['ID'] ."\">
				<button type=\"submit\" name=\"edit_collection\" >Edit</button>
			</form>";
		echo "</td>";
	}
		echo "</tr>";
	}

}
echo "</table>";
gamesClose($db);
include('footer.php');
?>