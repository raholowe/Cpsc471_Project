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

      function myScore() {
      $db = gamesConnect();
         $name = $_SESSION[login_user];
         $sql = "SELECT Users.community_score FROM Users WHERE Users.username = '$name'";
         $table = mysqli_query($db, $sql);
         if(mysqli_num_rows($table) == 1) {
            $row = mysqli_fetch_array($table);
            return $row['community_score'];
         } else {
            return "Error";
         }
         
   }
?>

   
   	<div>
   		<form action = "searchGameQuery.php" method = "get">
   			<input type = "text" name = "search" placeholder="Search Games" />
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchDeveloperQuery.php" method = "get">
   			<input type = "text" name = "search" placeholder="Search Developers"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
      </div>
      <div>
         <form action = "searchPublisherQuery.php" method = "get">
            <input type = "text" name = "search" placeholder="Search Publishers" />
            <input type = "submit" value = "Go!"/><br/>
         </form>
      </div>
      <div>
   		<form action = "searchPlayableCharacterQuery.php" method = "get">
   			<input type = "text" name = "search" placeholder="Search Playable Characters"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchPlatformQuery.php" method = "get">
   			<input type = "text" name = "search" placeholder="Search Platforms"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
   	<div>
   		<form action = "searchTagTypeQuery.php" method = "get">
   			<input type = "text" name = "search" placeholder = "Search Tags"/>
   			<input type = "submit" value = "Go!"/><br/>
   		</form>
   	</div>
      <div>
         <form action = "searchCollectionQuery.php" method = "get">
            <input type = "text" name = "search" placeholder = "Search Franchises"/>
            <input type = "submit" value = "Go!"/><br/>
         </form>
      </div>

<?php 
   include('footer.php') 
?>