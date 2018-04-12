<?php
include('session.php');
echo "<h1>Reviews</h1>";

$sortBy = $_GET['mode'];

$db = gamesConnect();
$sql = "SELECT * FROM REVIEW ORDER BY REVIEW.score " . $sortBy;

$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);
$arrow = "&uarr;";

if($count == 0) {
	echo "There are no reviews.";
} else {

	if($sortBy == DESC){
		$switchTo = "ASC";
		$arrow = "&darr;";
	} else {
		$switchTo = "DESC";
		$arrow = "&uarr;";
	}

	$goto = "view_all_reviews.php?mode=" . $switchTo;
	echo "<table border = '1'>
		<tr>
		<th>Title </th>

		<th>Review</th>
		
		<th>Score <a href=" .$goto . ">(" . $arrow .")</a></th>
		</tr>";

	while($row = mysqli_fetch_array($table)) {
		echo "<tr>";
		$goto = "view_game_details.php?key=" . $row['game_id']; 

		$gNQ = "SELECT GAME.title FROM GAME WHERE GAME.ID =" .$row['game_id'];
		$gameT = mysqli_query($db,$gNQ);
		$title = mysqli_fetch_array($gameT);
		echo "<td><a href=" . $goto . ">". $title['title'] ."</td>";
		$goto = "view_review_details.php?ID=". $row['game_id'] . "&name=" . $row['username'];
		echo "<td>" . $row['text'] . "<p><a href=" . $goto . ">See more</p></td>";
		echo "<td>" . $row['score'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
include('footer.php');
?>