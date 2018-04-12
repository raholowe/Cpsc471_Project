<?php

?>
<html>
   
   <head>
      <title>Sign Up Page</title>
      <link rel="stylesheet" type="text/css" href="mystyle.css">
      </style>
      
   </head>
   
   <body>
      <div align="center">
         <div align="center" class="transbox">
            <h1>Sign Up</h1>
            <div>
               <form action = "createUserQuery.php" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" required /><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" required /><br/><br />
                  <label>Email     :</label><input type = "text" name = "email" required /><br/><br />
                  <input type = "submit" value = " Create Account "/><br />
               </form>
               <div><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>