<?php
include('session.php');

echo "<h1>Platforms</h1>";

$sortBy = $_GET['mode'];
$sortCol = $_GET['col'];
$arrow = "&uarr;";

$db = gamesConnect();
$sql = "SELECT * FROM PLATFORM ORDER BY PLATFORM.". $sortCol . " " . $sortBy;


$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);

if($count == 0) {
	echo "There are no platforms.";
} else {

	if($sortBy == DESC){
		$switchTo = "ASC";
		$arrow = "&darr;";

	} else {
		$switchTo = "DESC";
		$arrow = "&uarr;";
	}

	$goto = "view_all_platforms.php?mode=" . $switchTo;
	echo "<table border = '1'>
		<tr>
		<th>Platform <a href=" .$goto . "&col=plat_name> (" . $arrow .")</a></th>
		<th>Manufacturer<a href=" .$goto . "&col=company> (" . $arrow .")</a></th>
		
		<th>Release Date <a href=" .$goto . "&col=release_date> (" . $arrow .")</a></th>";
	
	if($_SESSION['permission'] == 1) {
		echo "<th> Delete </th>";
		echo "<th> Edit </th>";
	}


	echo "</tr>";

	while($row = mysqli_fetch_array($table)) {
		echo "<tr>";
		$platName = urlencode($row['plat_name']);
		$goto = "view_platform_details.php?name=" . $platName; 

		echo "<td><a href=" . $goto . ">". $row['plat_name'] ."</td>";
		echo "<td>" . $row['company'] . "</td>";
		echo "<td>" . $row['release_date'] . "</td>";

		if($_SESSION['permission'] == 1) {
		
		echo "<td>";
		echo "<form action = \"deletePlatformQuery.php\" method = \"post\">
				<input type=\"hidden\" name=\"plat_name\" value=\"" . $row['plat_name'] ."\">
				<button type=\"submit\" name=\"delete_plat\" >Delete</button>
			</form>";
		echo "</td>";

			echo "<td>";
		echo "<form action = \"editPlatform.php\" method = \"post\">
				<input type=\"hidden\" name=\"plat_name\" value=\"". $row['plat_name'] ."\">
				<input type=\"hidden\" name=\"release\" value=\"". $row['release_date'] ."\">
				<input type=\"hidden\" name=\"company\" value=\"". $row['company'] ."\">
				<button type=\"submit\" name=\"edit_plat\" >Edit</button>
			</form>";
		echo "</td>";
	}

	echo "</tr>";

		echo "</tr>";
	}


	echo "</table>";
}

include('footer.php');
?>