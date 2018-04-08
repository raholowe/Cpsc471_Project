<?php

	include('session.php');
   function displayTest() {
   	$link = gamesConnect();

   $result = mysqli_query($link, "SELECT title FROM GAME");
   echo "<table border='1'>
	<tr>
	<th>ID</
	th>
	<th>Name</th>
	<th>Publisher</th>
	</tr>";
	
	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>" . $row['ID'] . "</td>";
	echo "<td>" . $row['title'] . "</td>";
	echo "<td>" . $row['pub_name'] . "</td>";
	echo "</tr>";
	}
	echo "</table>
	";
	gamesClose($link);
   }
?>
   

   	<div>
    	<h2><a href = "myProfile.php">My Profile</a></h2>
   	</div>
   	<div>
   		<form action = "searchGames.php" method = "post">
   			<label> Search for game </label><input type = "text" name = "game"/>
   			<input type = "submit" value = "Search Games"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchDevopers.php" method = "post">
   			<label> Search for game </label><input type = "text" name = "developer"/>
   			<input type = "submit" value = "Search Developers"/><br/>
   		</form>
	</div>
	<div>
   		<form action = "searchPCs.php" method = "post">
   			<label> Search for game </label><input type = "text" name = "pc"/>
   			<input type = "submit" value = "Search Playable Characters"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchPlatforms.php" method = "post">
   			<label> Search for game </label><input type = "text" name = "platform"/>
   			<input type = "submit" value = "Search Platforms"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchPublishers.php" method = "post">
   			<label> Search for game </label><input type = "text" name = "publisher"/>
   			<input type = "submit" value = "Search Publishers"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchTags.php" method = "post">
   			<label> Search for game </label><input type = "text" name = "game"/>
   			<input type = "submit" value = "Search Tags"/><br/>
   		</form>
   	</div>
<?php 
	include('footer.php') 
?>