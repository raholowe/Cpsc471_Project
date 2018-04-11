<?php
include('session.php');
$user = $_GET['name'];
$game = $_GET['ID'];
echo $user;
echo "<br>";
echo $game;
$db = gamesConnect();

gamesClose($db);
include('footer.php');

?>