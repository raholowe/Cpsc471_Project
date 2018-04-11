<?php
	include('session.php');

   function myGames() {
   	$db = gamesConnect();
   	$name = $_SESSION[login_user];

   	$sql = "SELECT DISTINCT
			    GAME.title,GAME.ID
			FROM
			    GAME
			INNER JOIN PLAYED_BY ON PLAYED_BY.game_id = GAME.ID
			INNER JOIN Users on PLAYED_BY.username = '$name'";

	$table = mysqli_query($db, $sql);

	$count = mysqli_num_rows($table);

	if($count == 0) {
		echo "You have no games in your list! <br>";
	} else {
		echo "<br><table border='1'>" ;

		while($row = mysqli_fetch_array($table) )
		{
			$goto = "view_game_details.php?key=" . $row['ID'];
			echo "<tr>";
			echo "<td><a href=".$goto.">". $row['title'] . "</a>" . "</td>";
			echo "</tr>";
		}

	}
	echo "</table>";
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
   		<a href="view_all_games.php"> Add games to your list! </a>

   		<?php
   		myGames();
   		?>
   	</div>
    
<?php
	include('footer.php');
?>