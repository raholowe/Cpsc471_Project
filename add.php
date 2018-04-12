<?php
include('session.php');
?>

<h1> Exercise your Admin powers! </h1>
<div>
	<h5> Add a User </h5>
	<form action = "insertNewUserQuery.php" method = "post">
		<label>Username:</label><input type = "text" name = "username" required /><br />
		<label>Default Password:</label><input type = "text" name = "password" required /><br/>
		<label>Email :</label><input type = "text" name = "email" required /><br/>
		<label>Admin Status:</label><input type="number" name="isAdmin" min="0" max="1" required><br/>
		<label>Starting Community Score:</label><input type="number" name="community_score" min="0" required><br/>
		<input type = "submit" value = " Create a User Account"/><br />
	</form>
	<a href="deleteUser?mode=ASC&col=username">Delete a user</a>
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
<div>
	<form action = "createUserQuery.php" method = "post">
		<label>Username  :</label><input type = "text" name = "username" required /><br /><br />
		<label>Password  :</label><input type = "password" name = "password" required /><br/><br />
		<label>Email  :</label><input type = "text" name = "email" required /><br/><br />
		<input type = "submit" value = " Create Account "/><br />
	</form>
</div>
<div>
<form action = "createUserQuery.php" method = "post">
  <label>Username  :</label><input type = "text" name = "username" required /><br /><br />
  <label>Password  :</label><input type = "password" name = "password" required /><br/><br />
  <label>Email  :</label><input type = "text" name = "email" required /><br/><br />
  <input type = "submit" value = " Create Account "/><br />
</form>
</div>
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