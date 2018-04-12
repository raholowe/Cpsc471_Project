<?php
include('session.php');

$db = gamesConnect();
$sql = "SELECT * FROM DEVELOPER";

$table = mysqli_query($db, $sql);
echo "<h1>Developers</h1>";
echo "<table border = '1'>
	<tr>
	<th>Name</th>
	<th>Region</th>
	<th>Team Size</th>
	<th>Team Lead</th>
	<th></th>
	<th></th>
	</tr>";

while($row = mysqli_fetch_array($table) ) {
	echo "<tr>" ;
	$sendName = urlencode($row['dev_name']);
	$goto = "view_dev_details.php?name=" . $sendName;
	echo "<td><a href=" . $goto . ">" . $row['dev_name'] . "</td>";
	
	if($row['region']=="NULL") {
		echo "<td></td>";
	} else {
		echo "<td>" . $row['region'] . "</td>";
	}
	
	if($row['team_size']=="NULL") {
		echo "<td></td>";
	} else {
		echo "<td>" . $row['team_size'] . "</td>";
	}

	if($row['lead']=="NULL") {
		echo "<td></td>";
	} else {
		echo "<td>" . $row['lead'] . "</td>";
	}
	
	echo "<td>";
	echo "<form action = \"deleteDeveloperQuery.php\" method = \"post\">
			<input type=\"hidden\" name=\"dev_name\" value=\"" . $row['dev_name'] ."\">
			<button type=\"submit\" name=\"delete_dev\" >Delete</button>
		</form>";
	echo "</td>";

	echo "<td>";
	echo "<form action = \"editDeveloper.php\" method = \"post\">
			<input type=\"hidden\" name=\"dev_name\" value=\"". $row['dev_name'] ."\">
			<button type=\"submit\" name=\"edit_dev\" >Edit</button>
		</form>";
	echo "</td></tr>";

}

echo "</table>";

gamesClose($db);
include('footer.php');
?>