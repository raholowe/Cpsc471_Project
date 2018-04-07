<?php

?>
<html>
   
   <head>
      <title>Sign Up Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      </style>
      
   </head>
   
   <body>
  
      <div>
         <div>
            <div ><b>Sign Up</b></div>
        
            <div>
               
               <form action = "createUserQuery.php" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" required /><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" required /><br/><br />
                  <label>Email  :</label><input type = "text" name = "email" required /><br/><br />
                  <input type = "submit" value = " Create Account "/><br />
               </form>
               
               <div><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>