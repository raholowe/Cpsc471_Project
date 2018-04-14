<?php
	include('session.php');
	function myScore() {
		$db = gamesConnect();
   		$name = $_GET['username'];
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
	   	$name = $_GET['username'];

	   	$sql = "SELECT *
				FROM
				    REVIEW
				INNER JOIN GAME on REVIEW.game_id = GAME.ID
				WHERE REVIEW.username = \"$name\" " ;
		
		$table = mysqli_query($db, $sql);

		$count = mysqli_num_rows($table);

		if($count == 0) {
		echo $name ." hasn't reviewed any games!<br>";
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
   	$name = $_GET['username'];

   	$sql = "SELECT DISTINCT
			    GAME.title,GAME.ID
			FROM
			    GAME
			INNER JOIN PLAYED_BY ON PLAYED_BY.game_id = GAME.ID
			INNER JOIN Users on PLAYED_BY.username = '$name'";

	$table = mysqli_query($db, $sql);

	$count = mysqli_num_rows($table);

	if($count == 0) {
		echo "<br>". $name ." has no games in their list! <br>";
	} else {
		echo "<br><table border='1'>" ;
		echo '<tr>
				<th>Title</th>';
		echo '</tr>';

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
    	 	echo $_GET['username'] 
    	 	?>'s Profile
    	</h1>
    	<p> Community Score: 
    		<?php
    		echo myScore();
    		?>
    	</p>
   	</div>
   	<div>
   		<h2> 
   		<?php
    	 	echo $_GET['username'] 
    	 	?>'s Games </h2>
   		<?php
   		myGames();
   		?>
   		<br>
   		<h2> 
   		<?php
    	 	echo $_GET['username'] 
    	 	?>'s Reviews </h2>
   		<?php
   		myReviews();
   		?>
   	</div>
    
<?php
	include('footer.php');
?>