<?php
	//checks to see if there is a session active, and takes you to the right page
   include('config.php');
   session_start();

   $link = gamesConnect();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($link,"SELECT username FROM Users WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   } 
   if(isset($_SESSION['login_user'])) {
      include_once('header.php');
   }
   gamesClose($link);
?>