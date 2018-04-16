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
	<th>Team Lead</th>";
	if($_SESSION['permission'] == 1) {
		echo "<th> Delete </th>";
		echo "<th> Edit </th>";
	}
	
	echo "</tr>";

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

	if($_SESSION['permission'] == 1) {
			echo "<td>";
	echo "<form action = \"deleteDeveloperQuery.php\" method = \"post\">
			<input type=\"hidden\" name=\"dev_name\" value=\"" . $row['dev_name'] ."\">
			<button type=\"submit\" name=\"delete_dev\" >Delete</button>
		</form>";
	echo "</td>";

	echo "<td>";
	echo "<form action = \"editDeveloper.php\" method = \"post\">
			<input type=\"hidden\" name=\"dev_name\" value=\"". $row['dev_name'] ."\">
			<input type=\"hidden\" name=\"region\" value=\"" . $row['region'] ."\">
			<input type=\"hidden\" name=\"team_size\" value=\"" . $row['team_size'] ."\">
			<input type=\"hidden\" name=\"lead\" value=\"" . $row['lead'] ."\">
			<button type=\"submit\" name=\"edit_dev\" >Edit</button>
		</form></td>";
	}
	
	echo "</tr>";

}

echo "</table>";

gamesClose($db);
include('footer.php');
?>