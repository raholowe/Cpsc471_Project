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
	<a href="deleteUser?mode=ASC&col=username">Delete a user</a>
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
	<a href="view_all_games.php?mode=ASC&col=title">Delete a Game</a>
</div>
<br><br>
<h5> Add a Developer </h5>
	<form action = "createGameQuery.php" method = "post" id = "createGame">
		<label>Name:</label><input type = "text" name = "dev_name" required /><br>
		<label>Lead:</label><input type = "text" name = "lead"  /><br>
		<label>Team Size:</label><input type = "number" name = "team_size"  /><br>
		<label>Region:</label><input type = "text" name = "region"  /><br>
		<input type = "submit" value = " Add Developer "/>
	</form>
	<a href="view_all_dev.php?mode=ASC&col=title">Delete a Developer</a>
</div>
<br><br>
<div>
<form action = "createUserQuery.php" method = "post">
  <label>Username  :</label><input type = "text" name = "username" required /><br /><br />
  <label>Password  :</label><input type = "password" name = "password" required /><br/><br />
  <label>Email  :</label><input type = "text" name = "email" required /><br/><br />
  <input type = "submit" value = " Create Account "/><br />
</form>
</div>
<br><br>
<div>
<form action = "createUserQuery.php" method = "post">
  <label>Username  :</label><input type = "text" name = "username" required /><br /><br />
  <label>Password  :</label><input type = "password" name = "password" required /><br/><br />
  <label>Email  :</label><input type = "text" name = "email" required /><br/><br />
  <input type = "submit" value = " Create Account "/><br />
</form>
</div>
 <?php
 include('footer.php');
 ?>