<?php
include('session.php');

$db = gamesConnect();
$sql = "SELECT * FROM PUBLISHER";

$table = mysqli_query($db, $sql);
echo "<h1>Publishers</h1>";
echo "<table border = '1'>
	<tr>
	<th>Name</th>
	<th>Region</th>
	</tr>";

while($row = mysqli_fetch_array($table) ) {
	echo "<tr>" ;
	$sendName = urlencode($row['pub_name']);
	$goto = "view_pub_details.php?name=" . $sendName;
	echo "<td><a href=" . $goto . ">" . $row['pub_name'] . "</td>";
	echo "<td>" . $row['region'] . "</td> </tr>";

}

echo "</table>";

gamesClose($db);
include('footer.php');
?>