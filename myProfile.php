<?php
	include('session.php');

   function myGames() {
   	$db = gamesConnect();

   	$sql = "SELECT DISTINCT
			    GAME.title,GAME.ID
			FROM
			    GAME
			INNER JOIN PLAYED_BY ON PLAYED_BY.game_id = GAME.ID
			INNER JOIN Users on PLAYED_BY.username = 'admin'";

	$tableQ = mysqli_query($db, $sql);

	echo "<table border='1'>
		<tr>
			<th>Title</th>
		</tr>";

	while($row = mysqli_fetch_array($tableQ) )
	{
		echo "<tr>";
		echo "<td>" . $row['title'] . "</td>";
		echo "</tr>";
	}
   	gamesClose($db);

   }
   
?>

   	<div>
    	<h1>
    		<?php
    	 	echo $_SESSION['login_user'] 
    	 	?>'s Profile
    	</h1>
   	</div>
   	<div>
   		<h2> My Games </h2>
   		<?php
   		myGames();
   		?>
   	</div>
    
<?php
	include('footer.php');
?>