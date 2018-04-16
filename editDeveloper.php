<?php
include('session.php');

?>

<div>
	<h5> Edit entry for <?php
				echo $_POST['dev_name'];
				?>
	</h5>

	<form action = "updateDeveloperQuery.php" method = "post" id = "createDev">
		<label>Name:</label><input type = "text" name = "dev_name" required value= <?php echo "\"".$_POST['dev_name']."\">";?>
		<br>
		<label>Lead:</label><input type = "text" name = "lead" value = <?php echo "\"".$_POST['lead']."\">";?>
		<br>
		<label>Team Size:</label><input type = "number" name = "team_size"value = <?php echo "\"".$_POST['team_size']."\">";?>
		<br>
		<label>Region:</label><input type = "text" name = "region" value= <?php echo "\"".$_POST['region']."\">";?><br>
		<input type = "hidden" name = "oldname" value = <?php echo "\"".$_POST['dev_name']."\">";?>
		<input type = "hidden" name = "oldteam" value = <?php echo "\"".$_POST['team_size']."\">";?>
		<input type = "hidden" name = "oldlead" value = <?php echo "\"".$_POST['lead']."\">";?>
		<input type = "hidden" name = "oldregion" value = <?php echo "\"".$_POST['region']."\">";?>

		<input type = "submit" value = <?php echo "\"Update ".$_POST['dev_name']."\""; ?> >
	</form>

<?php
include('footer.php');
?>