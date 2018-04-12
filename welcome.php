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
   		<form action = "searchGames.php" method = "post">
   			<input type = "text" name = "game" placeholder="Search Games" />
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchDevelopers.php" method = "post">
   			<input type = "text" name = "developer" placeholder="Search Developers"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
	</div>
	<div>
   		<form action = "searchPCs.php" method = "post">
   			<input type = "text" name = "pc" placeholder="Search Playable Characters"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchPlatforms.php" method = "post">
   			<input type = "text" name = "platform" placeholder="Search Platforms"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchPublishers.php" method = "post">
   			<input type = "text" name = "publisher" placeholder="Search Publishers" />
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchTags.php" method = "post">
   			<input type = "text" name = "game" placeholder = "Search Tags"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
      <div>
         <form action = "searchCollection.php" method = "post">
            <input type = "text" name = "game" placeholder = "Search Franchises"/>
            <input type = "submit" value = "Go!"/><br/>
         </form>
      </div>
<?php 
	include('footer.php') 
?>