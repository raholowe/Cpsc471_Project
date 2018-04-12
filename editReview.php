<?php
include('session.php');
?>

<div>
	<h5> Edit your review of <?php
				$id = $_GET['ID'];
				$db = gamesConnect();
				$sql = "SELECT GAME.title FROM GAME WHERE GAME.ID = '$id'";
				$table = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($table);
				echo $row['title'];
				?>

	</h5>
	<form action = "updateReviewQuery.php" method = "post" id = "updateReview">
		<textarea required form="updateReview" name="text" rows = "8" cols ="75"><?php
				$id = $_GET['ID'];
				$user = $_GET['username'];
				$db = gamesConnect();
				$sql = "SELECT * FROM REVIEW WHERE REVIEW.game_id = '$id' AND REVIEW.username = \"$user\" ";
				$table = mysqli_query($db,$sql);
				$row = mysqli_fetch_array($table);
				echo $row['text'];
				?></textarea>
		<br>
		<label>Score:</label>
		<select name="score" form="updateReview" required>
			<option value = 0>0</option>
			<option value = 1>1</option>
			<option value = 2>2</option>
			<option value = 3>3</option>
			<option value = 4>4</option>
			<option value = 5>5</option>
			<option value = 6>6</option>
			<option value = 7>7</option>
			<option value = 8>8</option>
			<option value = 9>9</option>
			<option value = 10>10</option>
		</select>
		<?php
		echo '<input type = "hidden" name = "game_id" value = "' . $_GET['ID']. '">';
		echo '<input type = "hidden" name = "username" value = "' . $_GET['username']. '">';
		?>
		
		<input type = "submit" value = "Edit review"/><br />
	</form>
		<?php
		echo '<a href = "deleteReview.php?ID='.$_GET['ID']. '&username='.$_GET['username'].'">Delete your review</a>';
		?>
</div>

<?php
include('footer.php');
?>