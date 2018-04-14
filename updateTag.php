<?php
include('session.php');
?>

<div>
	<h5> Update tag on <?php
				$id = $_POST['ID'];
				$db = gamesConnect();
				$sql = "SELECT GAME.title FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($table);
				echo $row['title'];
				?> to: 
	</h5>
	<form action = "updateTagTypeQuery.php" method = "post" id = "updateTag">
		<label>Tag:  </label><input type = "text" name = "newType"  placeholder = 
		<?php
		$db = gamesConnect();
		$id = $_POST['ID'];
		$user = $_POST['username'];
		$type = $_POST['type'];
 
		$sql = "SELECT TAG_TYPE.type from TAG_TYPE WHERE TAG_TYPE.game_id = $id AND TAG_TYPE.username = \"$user\" AND TAG_TYPE.type = \"$type\"";
		
		$table = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($table);
		echo "\"".$row['type']."\"";
		?> required>
		<?php
		$user = $_SESSION['login_user'];
		echo '<input type = "hidden" name = "game_id" value = "' . $id. '">';
		echo '<input type = "hidden" name = "username" value = "' . $user .'">';
		echo '<input type = "hidden" name = "oldType" value = "' . $type. '">';
		?>
		
		<input type = "submit" value = "Update Tag"><br>
	</form>
</div>

<?php
include('footer.php');
?>