<?php
include('session.php');
$dev_name = $_GET['name'];
$db = gamesConnect();
$sql = "SELECT * FROM DEVELOPER WHERE DEVELOPER.dev_name = '$dev_name'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['dev_name'] ."</h1>";
echo "<h2>Region: " . $row['region'] . "</h2>";
?>