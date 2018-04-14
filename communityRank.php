<?php
    include('session.php');
    $user= $_SESSION['login_user'];
	// Create connection
	$con=gamesConnect();
	// Check connection

	$sql = "SELECT Users.username, Users.community_score FROM Users ORDER BY community_score DESC";
	$table = mysqli_query($con, $sql);

	echo '
		<h1>Community Leaderboard</h1><table border = "1">
			<tr>
				<th>Rank</th>
				<th>User</th>
				<th>Community Score</th>
				<th>Number of Games</th>
			</tr>';

	$count = 1;
	while($row = mysqli_fetch_array($table)) {
		echo '<tr>';
		echo '<td>' . $count . "</td>";
		$count = $count + 1;
		echo '<td><a href="userProfile.php?username='. $row['username'] .'">'. $row['username'] .'</a></td>';
		echo '<td>'. $row['community_score'] . '</td>';
		$search = $row['username'];

		$numGames = "SELECT COUNT(*) as gameCount FROM PLAYED_BY WHERE PLAYED_BY.username = \"$search\"";
		$result = mysqli_query($con, $numGames);
		$num = mysqli_fetch_array($result);
		echo '<td>'. $num['gameCount'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
	gamesClose($con);

	include('footer.php');
?>