<?php
include('session.php');

echo "<h1>Platforms</h1>";

$sortBy = $_GET['mode'];
$sortCol = $_GET['column'];

$db = gamesConnect();
$sql = "SELECT * FROM PLATFORM ORDER BY PLATFORM.". $sortCol . " " . $sortBy;


$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);

if($count == 0) {
	echo "There are no platforms.";
} else {

	if($sortBy == DESC){
		$switchTo = "ASC";
	} else {
		$switchTo = "DESC";
	}

	$goto = "view_all_platforms.php?mode=" . $switchTo;
	echo "<table border = '1'>
		<tr>
		<th>Platform <a href=" .$goto . "&column=plat_name>(" . $sortBy .")</a></th>
		<th>Manufacturer<a href=" .$goto . "&column=company>(" . $sortBy .")</a></th>
		
		<th>Release Date <a href=" .$goto . "&column=release_date>(" . $sortBy .")</a></th>
		</tr>";

	while($row = mysqli_fetch_array($table)) {
		echo "<tr>";
		$goto = "view_platform_details.php?name=" . $row['plat_name']; 

		echo "<td><a href=" . $goto . ">". $row['plat_name'] ."</td>";
		echo "<td>" . $row['company'] . "</td>";
		echo "<td>" . $row['release_date'] . "</td>";

		echo "</tr>";
	}
	echo "</table>";
}

include('footer.php');
?>