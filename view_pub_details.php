<?php
include('session.php');
$pub_name = $_GET['name'];
$db = gamesConnect();
$sql = "SELECT * FROM PUBLISHER WHERE PUBLISHER.pub_name = '$pub_name'";

$table = mysqli_query($db, $sql);
$row = mysqli_fetch_array($table);

echo "<h1>". $row['pub_name'] ."</h1>";
echo "<h2>Region: " . $row['region'] . "</h2>";
?>