<?php
   require("config.php");
   session_start();
   $link = gamesConnect();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // check to see username and password sent from form
      
      $username = mysqli_real_escape_string($link,$_POST['username']);
      $password = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT username FROM USER WHERE username = '$username' and password = '$password'";
      $table = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($table,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($table);
      
      // If table matched $username and $password, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['login_user'] = $username;
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
      
    
      <link rel="stylesheet" type="text/css" href="style.css">
      
   </head>
   
   <body bgcolor = "#FFFFFF">
  
      <div align = "center">
         <div  align = "left">
            <div ><b>Login</b></div>
        
            <div>
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password"/><br/><br />
                  <input type = "submit" value = " Login "/><br />
               </form>
               <form action = "createUser.php" method = "post">
                  <input type = "submit" value = " Sign Up"/> <br />
               </form>
               
               <div ><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>