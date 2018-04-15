<?php
include('session.php');

?>

<div>
	<h5> Edit entry for <?php
				$id = $_POST['ID'];
				$db = gamesConnect();
				$sql = "SELECT GAME.title FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($table);
				echo $row['title'];
				?>

	</h5>
	<form action = "createPublisherQuery.php" method = "post" id = "createPub">
		<label>Name:</label><input type = "text" name = "pub_name" required /><br>
		<label>Region:</label><input type = "text" name = "region"  /><br>
		<input type = "submit" value = " Add Publisher "/>
	</form>

<?php
include('footer.php');
?>