<?php
include('session.php');

?>

<div>
	<h5> Edit entry for <?php
				echo $_POST['plat_name'];
				?>
	</h5>

	<form action = "updatePlatformQuery.php" method = "post" id = "editPlatform">
		<label>Name:</label><input type = "text" name = "plat_name" required value= <?php echo "\"".$_POST['plat_name']."\">";?>
		<br>
		<label>Manufacturer:</label><input type = "text" name = "company" value = <?php echo "\"".$_POST['company']."\">";?>
		<br>
		<label>Release Date:</label><input type = "date" name = "release_date"value = <?php echo "\"".$_POST['release']."\">";?>
		<br>
		<input type = "hidden" name = "oldname" value = <?php echo "\"".$_POST['plat_name']."\">";?>
		

		<input type = "submit" value = <?php echo "\"Update ".$_POST['plat_name']."\""; ?> >
	</form>

<?php
include('footer.php');
?>