<?php
	include('session.php');
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
	function myReviews() {
		$db = gamesConnect();
	   	$name = $_SESSION[login_user];

	   	$sql = "SELECT *
				FROM
				    REVIEW
				INNER JOIN GAME on REVIEW.game_id = GAME.ID
				WHERE REVIEW.username = \"$name\" " ;
		
		$table = mysqli_query($db, $sql);

		$count = mysqli_num_rows($table);

		if($count == 0) {
		echo "You have no reviews <br>";
		} else {
		echo "<table border='1'>" ;
		echo '<tr>
				<th>Title</th>
				<th>Review</th>
				<th>Score</th>

				</tr>';
			while($row = mysqli_fetch_array($table) )
			{
				$goto = "view_game_details.php?key=" . $row['ID'];
				echo "<tr>";
				echo "<td><a href=".$goto.">". $row['title'] . "</a>" . "</td>";
				
				echo "<td>". $row['text'] . "</td>";
				
				echo "<td>" . $row['score'] . "</td>";
				echo "</tr>";
			}
		}
		echo "</table>";

   	gamesClose($db);
   }

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
		echo "<br>You have no games in your list! <br>";
	} else {
		echo "<br><table border='1'>" ;
		echo '<tr>
				<th>Title</th>
				<th>Remove</th>
				<th>Add Tags</th>';

		echo '</tr>';

		while($row = mysqli_fetch_array($table) )
		{
			$goto = "view_game_details.php?key=" . $row['ID'];
			echo "<tr>";
			echo "<td><a href=".$goto.">". $row['title'] . "</a>" . "</td>";

			echo "<td>";
			echo "<form action = \"removeFromMyGames.php\" method = \"post\">
					<input type=\"hidden\" name=\"ID\" value=\"" . $row['ID'] ."\">
					<input type=\"hidden\" name=\"username\" value=\"" . $name . "\">
					<button type=\"submit\" name=\"remove_MG\" >Remove</button>
				</form>";
			echo "</td>";

			echo "<td>";
			//add Tag 
			echo "<form action = \"addTag.php\" method = \"get\">
					<input type=\"hidden\" name=\"ID\" value=\"". $row['ID'] ."\">
				<button type=\"submit\" name=\"edit_game\" >Add Tags</button>
				</form>";
			echo "</td>";
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
    	<p> Community Score: 
    		<?php
    		echo myScore();
    		?>
    	</p>
   	</div>
   	<div>
   		<h2> My Games </h2>
   		<a href="view_all_games.php?mode=DESC&col=title"> Add games to your list! </a>

   		<?php
   		myGames();
   		?>
   		<br>
   		<h2> My Reviews </h2>
   		<?php
   		myReviews();
   		?>
   	</div>
    
<?php
	include('footer.php');
?>