<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>

      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-brand">GameDB</span>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        	<?php
                if(isset($_SESSION['login_user'])){
                        echo '
                        	<li class = "nav-item ">
            					     <a class = "nav-link" href ="welcome.php">Home</a>
            				      </li>
                          <li class="nav-item">
                        		<a class="nav-link" href="myProfile.php">My Profile</a>
                        	</li>';

                          if($_SESSION['permission'] == 1) {
                            echo '<li class="nav-item">
                                    <a class = "nav-link" href ="add.php">Admin</a>
                                   </li>';
                          }
                        echo '
                  				<li class="nav-item">
                  					<a class = "nav-link" href ="logout.php">Logout</a>
                  				</li>';
                  				 		
                }else{
                    echo '<li><a href ="index.php">Home</a></li>';
                }
            ?>
          
      </div>
    </nav>