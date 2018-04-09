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
		echo "You have no games in your list!";
	} else {
		echo "<br><table border='1'>" ;

		while($row = mysqli_fetch_array($table) )
		{
			$goto = "view_game_details.php?key=" . $row['ID'];
			echo "<tr>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td><a href=".$goto.">View</a>" . "</td>";
			echo "</tr>";
		}

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
   		<a href="viewGames.php"> Add games to your list </a>
   	</div>
    
<?php
	include('footer.php');
?>