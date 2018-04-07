<?php
   include('session.php');
   function displayTest() {
   	$link = gamesConnect();

   $result = mysqli_query($link, "SELECT * FROM GAME");
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
<html">
   
   <head>
      <title>Welcome! </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
      <?php displayTest(); ?>
   </body>
   
</html>