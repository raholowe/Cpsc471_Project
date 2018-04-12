<?php
   require("config.php");
   session_start();
   $link = gamesConnect();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // check to see username and password sent from form
      
      $username = mysqli_real_escape_string($link,$_POST['username']);
      $password = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT username, isAdmin FROM Users WHERE username = '$username' and password = '$password'";
      $table = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($table,MYSQLI_ASSOC);
      $isAdmin = $row['isAdmin'];
      //echo $isAdmin;
      
      $count = mysqli_num_rows($table);
      
      // If table matched $username and $password, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['login_user'] = $username;
         $_SESSION['permission'] = $isAdmin;
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   gamesClose($link);

?>
<html>
   <head>
      <title>Login Page</title>
      <link href="mystyle.css" rel="stylesheet" type="text/css">
   </head>
   
   <body>
   <div class ="row">
      <ul class="help-nav">
      <li><a href="about.html"> ABOUT </a></li>
      <li><a href="help.html"> HELP </a></li>
      </ul>
   </div>
      <div align = "center">
         <div  align = "center">
            <div class ="transbox">
               <form action = "" method = "post">
                  <h1>Login</h2>
                  <label>Username  :</label><input type = "text" name = "username"/> <br /><br />
                  <label>Password  :</label><input type = "password" name = "password"/><br/><br />
                  <input type = "submit" value = " Login "/><br />
               </form>
               <label>Don't have an account? Create one!</label>
               <form action = "createUser.php" method = "post">
                  <input type = "submit" value = " Sign Up"/> <br />
               </form>
               
               <div ><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>
