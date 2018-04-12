<?php
include('session.php');
$user = $_GET['name'];
$game = $_GET['ID'];
$name = $_SESSION['login_user'];

$db = gamesConnect();

$sql = "SELECT * FROM REVIEW WHERE REVIEW.game_id = " .$game . " AND REVIEW.username = \"" . $user . "\"";

$table = mysqli_query($db, $sql);
$count = mysqli_num_rows($table);

$sql_game = "SELECT GAME.title, GAME.ID FROM GAME WHERE GAME.ID = " . $game;

$table_game = mysqli_query($db,$sql_game);

$game_name = mysqli_fetch_array($table_game);

if($count == 0) {
	echo "SOMETHING IS WRONG";
} else {
	$row = mysqli_fetch_array($table);
	$goto = "view_game_details.php?key=" . $game_name['ID']; 

	echo "Review of: <a href=" . $goto . ">". $game_name['title'] ."</a><br>";
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