<?php
include('session.php');
?>

<h1> Exercise your Admin powers! </h1>
<div>
	<h5> Add a User </h5>
	<form action = "insertNewUserQuery.php" method = "post" id = "createUser">
		<label>Username:</label><input type = "text" name = "username" required /><br />
		<label>Default Password:</label><input type = "text" name = "password" required /><br/>
		<label>Email :</label><input type = "text" name = "email" required /><br/>
		<label>Admin? </label>
		<select name="isAdmin" form="createUser" required>
			<option value = 0>No</option>
			<option value = 1>Yes</option>
		</select>	
		
		<label>Starting Community Score:</label><input type="number" name="community_score" min="0" required><br/>
		<input type = "submit" value = " Create a User Account"/><br />
	</form>
	<a href="deleteUser?mode=ASC&col=username">Delete or Edit a user</a>
</div>
<br><br>
<div>
	<h5> Add a Game </h5>
	<form action = "createGameQuery.php" method = "post" id = "createGame">
		<label>Title:</label><input type = "text" name = "title" required /><br>
		<label>Developer: </label>
		<select name="dev_name" form="createGame" required>
			<?php
				echo "<option value= \"\"> Please Select </option>";
				$db = gamesConnect();
				$sql = "SELECT * FROM DEVELOPER";
				$table = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($table))
				{
					echo "<option value=\"" . $row['dev_name'] . "\"> ". $row['dev_name'] . "</option>";
				}
			?>
		</select>
		<label>Publisher: </label>
		<select name="pub_name" form="createGame" required>
			<?php
				echo "<option value= \"\"> Please Select </option>";
				$db = gamesConnect();
				$sql = "SELECT * FROM Publisher";
				$table = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($table))
				{
					echo "<option value=\"" . $row['pub_name'] . "\"> ". $row['pub_name'] . "</option>";
				}
			?>
		</select>
		<label>Collection: </label>
		<select name="collection_id" form="createGame">
			<?php
				echo "<option value= \"\"> Please Select </option>";
				$db = gamesConnect();
				$sql = "SELECT * FROM Collection";
				$table = mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($table))
				{
					echo "<option value=\"" . $row['collection_id'] . "\"> ". $row['name'] . "</option>";
				}
			?>
		</select>
		<br>
		<label>Copies Sold:</label><input type = "number" name = "copies_sold"  /><br>
		<label>Release Date:</label><input type = "date" name = "release_date"  /><br>
		<input type = "submit" value = " Add Game "/>
	</form>
	<a href="view_all_games.php?mode=ASC&col=title">Delete or edit a Game</a>
</div>
<br><br>
<div>
<h5> Add a Developer </h5>
	<form action = "createDeveloperQuery.php" method = "post" id = "createDev">
		<label>Name:</label><input type = "text" name = "dev_name" required /><br>
		<label>Lead:</label><input type = "text" name = "lead"  /><br>
		<label>Team Size:</label><input type = "number" name = "team_size"  /><br>
		<label>Region:</label><input type = "text" name = "region"  /><br>
		<input type = "submit" value = " Add Developer "/>
	</form>
	<a href="view_all_dev.php?mode=ASC&col=title">Delete or edit a Developer</a>
</div>
<br><br>
<div>
<h5> Add a Publisher </h5>
	<form action = "createPublisherQuery.php" method = "post" id = "createPub">
		<label>Name:</label><input type = "text" name = "pub_name" required /><br>
		<label>Region:</label><input type = "text" name = "region"  /><br>
		<input type = "submit" value = " Add Publisher "/>
	</form>
	<a href="view_all_pub.php?mode=ASC&col=title">Delete or edit a Publisher</a>
</div>
<br><br>
<div>
<h5> Add a Game Collection </h5>
	<form action = "createCollectionQuery.php" method = "post" id = "createCollection">
		<label>Name:</label><input type = "text" name = "name" required /><br>
		<input type = "submit" value = " Add Collection "/>
	</form>
	<a href="view_all_franchise.php?mode=ASC&col=title">Delete or edit a Game Collection</a>
</div>
<br><br>
<div>
<h5> Add a Platform </h5>
	<form action = "createPlatformQuery.php" method = "post" id = "createPlatform">
		<label>Name:</label><input type = "text" name = "plat_name" required ><br>
		<label>Release Date:</label><input type = "date" name = "release_date" required><br>
		<label>Manufacturer:</label><input type = "text" name = "company" required ><br>
		<input type = "submit" value = " Add Platform "/>
	</form>
	<a href="view_all_platforms.php?mode=ASC&col=plat_name">Delete or edit a Platform</a>
</div>
<?php
include('footer.php');
?>