<?php
	//returns 0 if not connected
   func gamesConnect() {
   	 $link = mysqli_connect("localhost", "root", "cpsc471", "games");
   	 if (mysqli_connect_errno($con))
   	 {
   	 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
   	 	return 0;
   	 } else {
   	 	return $link;
   	 }
   }

   func gamesClose($db) {
   		mysqli_close($db)
   }
?>