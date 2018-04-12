<?php
include('session.php');
?>

<div>
	<h5> Tag <?php
				$id = $_GET['ID'];
				$db = gamesConnect();
				$sql = "SELECT GAME.title FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($table);
				echo $row['title'];
				?> as: 
	</h5>
	<form action = "createTagTypeQuery.php" method = "post" id = "addTag">
		<label>Tag:  </label><input type = "text" name = "type" required>
		<?php
		$user = $_SESSION['login_user'];
		echo '<input type = "hidden" name = "game_id" value = "' . $_GET['ID']. '">';
		echo '<input type = "hidden" name = "username" value = "' . $user. '">';
		?>
		
		<input type = "submit" value = "Add Tag"/><br />
	</form>
</div>

<?php
include('footer.php');
?>