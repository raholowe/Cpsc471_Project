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
	<form action = "updateGameQuery.php" method = "post" id = "updateGame">
		<input type = "hidden" name = "ID" value=

		<?php
			$id = $_POST['ID'];
			echo "\"".$id."\"";
		?>

		>
		<label>Title:</label><input type = "text" name = "title" required size="35" value= 
		<?php
			$id = $_POST['ID'];
			$db = gamesConnect();
			$sql = "SELECT GAME.title FROM GAME WHERE GAME.ID = '$id'";
			$table = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($table);
			echo "\"".$row['title']."\">";
		?>
		<br>
		<label>Developer: </label>
		<select name="dev_name" form="updateGame" required>
			<?php
				$db = gamesConnect();
				$sql = "SELECT * FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db, $sql);
				$selected = mysqli_Fetch_array($table);
				echo "<option value= \"" .$selected['dev_name']. "\">" . $selected['dev_name'] . "</option>";
				
				$sql = "SELECT * FROM DEVELOPER";
				$table = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($table))
				{
					echo "<option value=\"" . $row['dev_name'] . "\">". $row['dev_name'] . "</option>";
				}
			?>
		</select>
		<label>Publisher: </label>
		<select name="pub_name" form="updateGame" required>
			<?php
				$db = gamesConnect();
				$sql = "SELECT * FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db, $sql);
				$selected = mysqli_Fetch_array($table);
				echo "<option value= \"" .$selected['pub_name']. "\">" . $selected['pub_name'] ."</option>";

				$sql = "SELECT * FROM Publisher";
				$table = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($table))
				{
					echo "<option value=\"" . $row['pub_name'] . "\"> ". $row['pub_name'] . "</option>";
				}
			?>
		</select>
		<label>Collection: </label>
		<select name="collection_id" form="updateGame">
			<?php
				$id = $_POST['ID'];
				$db = gamesConnect();
				$sql = "SELECT GAME.title as name, GAME.ID as gameID, COLLECTION.ID as collID, COLLECTION.name as collName FROM GAME,COLLECTION WHERE GAME.ID = '$id' AND GAME.collection_id = COLLECTION.ID";
				$table = mysqli_query($db, $sql);
				$game = mysqli_fetch_array($table);
	
				echo "<option value=\"" . $game['collID'] . "\"> ". $game['collName'] . "</option>";
				
				$sql = "SELECT * FROM Collection";
				$table = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($table))
				{
					echo "<option value=\"" . $row['ID'] . "\"> ". $row['name'] . "</option>";
				}
			?>
		</select>
		<br>
		<label>Copies Sold:</label><input type = "number" name = "copies_sold" 
			<?php
				$id = $_POST['ID'];
				$db = gamesConnect();
				$sql = "SELECT * FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db, $sql);
				$game = mysqli_fetch_array($table);
				$number = $game['copies_sold'];
				echo "value=\"".$number."\"";
			?>
		><br>
		<label>Release Date:</label><input type = "date" name = "release_date"
		<?php
				$id = $_POST['ID'];
				$db = gamesConnect();
				$sql = "SELECT * FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db, $sql);
				$game = mysqli_fetch_array($table);
				$number = $game['release_date'];
				echo "value=\"".$number."\"";
			?>
		><br>
		<input type = "submit" value = "Edit Game"/>
	</form>

<?php
include('footer.php');
?>