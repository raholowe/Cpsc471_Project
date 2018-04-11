<?php
include('session.php');
echo "<h1>Reviews</h1>";

$db = gamesConnect();
$sql = "SELECT * FROM REVIEW";

$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);

if($count == 0) {
	echo "There are no reviews.";
} else {
	echo "<table border = '1'>
		<tr>
		<th>Title</th>
		<th>Review</th>
		<th>Score</th>
		</tr>";

	while($row = mysqli_fetch_array($table)) {
		echo "<tr>";
		$goto = "view_game_details.php?key=" . $row['game_id']; 
		$title = "Test";
		echo "<td><a href=" . $goto . ">". $title ."</td>";
		$goto = "view_review_details.php?ID=". $row['game_id'] . "&name=" . $row['username'];
		echo "<td>" . $row['text'] . "<p><a href=" . $goto . ">See more</p></td>";
		echo "<td>" . $row['score'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
include('footer.php');
?>