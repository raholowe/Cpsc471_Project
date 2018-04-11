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
	</tr>";

while($row = mysqli_fetch_array($table) ) {
	echo "<tr>" ;
	$sendName = urlencode($row['dev_name']);
	$goto = "view_dev_details.php?name=" . $sendName;
	echo "<td><a href=" . $goto . ">" . $row['dev_name'] . "</td>";
	echo "<td>" . $row['region'] . "</td> </tr>";

}

echo "</table>";

gamesClose($db);
include('footer.php');
?>