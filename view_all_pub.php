<?php
include('session.php');

$db = gamesConnect();
$sql = "SELECT * FROM PUBLISHER";

$table = mysqli_query($db, $sql);
echo "<h1>Publishers</h1>";
echo "<table border = '1'>
	<tr>
	<th>Name</th>
	<th>Region</th>";

	if($_SESSION['permission'] == 1) {
		echo "<th> Delete </th>";
		echo "<th> Edit </th>";
	}
echo "</tr>";

while($row = mysqli_fetch_array($table) ) {
	echo "<tr>" ;
	$sendName = urlencode($row['pub_name']);
	$goto = "view_pub_details.php?name=" . $sendName;
	echo "<td><a href=" . $goto . ">" . $row['pub_name'] . "</td>";

	$reg = $row['region'];

	if($row['region'] == "NULL") {
		$reg = "";
	}
	echo "<td>" . $reg . "</td>";

	if($_SESSION['permission'] == 1) {
		
		echo "<td>";
		echo "<form action = \"deletePublisherQuery.php\" method = \"post\">
				<input type=\"hidden\" name=\"name\" value=\"" . $row['pub_name'] ."\">
				<button type=\"submit\" name=\"delete_pub\" >Delete</button>
			</form>";
		echo "</td>";

			echo "<td>";
		echo "<form action = \"editPublisher.php\" method = \"post\">
				<input type=\"hidden\" name=\"name\" value=\"". $row['pub_name'] ."\">
				<button type=\"submit\" name=\"edit_game\" >Edit</button>
			</form>";
		echo "</td>";
	}

	echo "</tr>";

}

echo "</table>";

gamesClose($db);
include('footer.php');
?>