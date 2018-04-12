<?php
include('session.php');
$sortBy = $_GET['mode'];
$sortCol = $_GET['col'];
$arrow = "&uarr;";


$db = gamesConnect();
$sql = "SELECT * FROM Users ORDER BY Users.". $sortCol . " " . $sortBy;

$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);

if($count == 0) {
	echo "There are no users.";
} else {

	if($sortBy == DESC){
		$switchTo = "ASC";
		$arrow = "&darr;";

	} else {
		$switchTo = "DESC";
		$arrow = "&uarr;";

	}

	$goto = "deleteUser.php?mode=" . $switchTo;
	echo "<table border = '1'>
		<tr>
		<th>Username <a href=" .$goto . "&col=username>(" . $arrow .")</a></th>
		<th>Community Score<a href=" .$goto . "&col=community_score>(" . $arrow .")</a></th>
		<th>Email<a href=" .$goto . "&col=email>(" . $arrow .")</a></th>
		
		<th>Admin?<a href=" .$goto . "&col=isAdmin>(" . $arrow .")</a></th>
		<th>Delete</th>
		</tr>";

	while($row = mysqli_fetch_array($table)) {
		echo "<tr>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['community_score'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		$admin = "";
		if($row['isAdmin'] == 1) {
			$admin = "Yes";
		} else {
			$admin = "No";
		}
		echo "<td>" . $admin . "</td>";

		echo "<td>";
		echo "<form action = \"deleteUserQuery.php\" method = \"post\">
				<input type=\"hidden\" name=\"username\" value=\"". $row['username'] ."\">
				<button type=\"submit\" name=\"delete_user\" >Delete</button>
			</form>";
		echo "</td>";

		echo "</tr>";
	}
	echo "</table>";
}

include('footer.php');
?>