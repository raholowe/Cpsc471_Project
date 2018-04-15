<?php
include('session.php');

?>

<div>
	<h5> Edit entry for <?php
				echo $_POST['name'];
				?>
	</h5>
	<form action = "updatePublisherQuery.php" method = "post" id = "updatePub">
		<input type = "hidden" name = "oldname" value = <?php echo "\"".$_POST['name']."\"";?>
	</h5>
		<label>Name:</label><input type = "text" name = "pub_name" required value= <?php echo "\"".$_POST['name']."\">";?>
		<br>
		<label>Region:</label><input type = "text" name = "region" value= <?php echo "\"".$_POST['region']."\">";?><br>
		<input type = "submit" value = <?php echo "\"Update ".$_POST['name']."\""; ?> >
	</form>

<?php
include('footer.php');
?>