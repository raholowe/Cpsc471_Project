<?php
include('session.php');

?>

<div>
	<h5> Edit entry for <?php
				echo $_POST['name'];
				?>
	</h5>

	<form action = "updateCollectionQuery.php" method = "post" id = "updateCollection">
		<label>Name:</label><input type = "text" name = "name" required value= <?php echo "\"".$_POST['name']."\">";?>
		<br>
		<input type = "hidden" name = "ID" value = <?php echo "\"".$_POST['ID']."\">";?>

		<input type = "submit" value = <?php echo "\"Update ".$_POST['name']."\""; ?> >
	</form>

<?php
include('footer.php');
?>