<?php
include('session.php');
$user = $_GET['name'];
$game = $_GET['ID'];
$name = $_SESSION['login_user'];

$db = gamesConnect();

$sql = "SELECT * FROM REVIEW WHERE REVIEW.game_id = " .$game . " AND REVIEW.username = \"" . $user . "\"";

$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);

if($count == 0) {
	echo "SOMETHING IS WRONG";
} else {
	$row = mysqli_fetch_array($table);
	echo "Review by: " . $row['username'] . "<br>";
	echo "Score: " . $row['score'];
	echo "<br>";
	echo $row['text'];
	echo "<br>";
}

//if the current user wrote this review, let them edit it
if($user == $name) {
	echo "Edit Button";
}




gamesClose($db);
include('footer.php');

?>