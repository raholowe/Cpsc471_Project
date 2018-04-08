<?php
//Verify the session, and redirect to login/create user

   require('config.php');
   session_start();
   
   $link = gamesConnect();
   
   $user_check = $_SESSION['login_user'];

   $sql = "SELECT username FROM Users WHERE username = '$user_check' ";

   $result = mysqli_query($link, $sql);
   
   $row = mysqli_fetch_array($result); //getting an arror here
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   } else {
   	  header("location:welcome.php");
   }
   gamesClose($link);
?>