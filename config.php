<?php
	//returns 0 if not connected
   function gamesConnect() 
   {
   	 $link = mysqli_connect("localhost", "root", "cpsc471", "games");
   	 if (mysqli_connect_errno($link)) {
   	 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
   	 	return 0;
   	 } else {
   	 	return $link;
   	 }
   }

   function gamesClose($db) {
   		mysqli_close($db);
   }
?>