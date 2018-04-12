<?php

   include('session.php');
   function displayTest() {
      $link = gamesConnect();

   $result = mysqli_query($link, "SELECT title FROM GAME");
   echo "<table border='1'>
   <tr>
   <th>ID</
   th>
   <th>Name</th>
   <th>Publisher</th>
   </tr>";
   
   while($row = mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['ID'] . "</td>";
   echo "<td>" . $row['title'] . "</td>";
   echo "<td>" . $row['pub_name'] . "</td>";
   echo "</tr>";
   }
   echo "</table>
   ";
   gamesClose($link);
   }

      function myScore() {
      $db = gamesConnect();
         $name = $_SESSION[login_user];
         $sql = "SELECT Users.community_score FROM Users WHERE Users.username = '$name'";
         $table = mysqli_query($db, $sql);
         if(mysqli_num_rows($table) == 1) {
            $row = mysqli_fetch_array($table);
            return $row['community_score'];
         } else {
            return "Error";
         }
         
   }
?>

<!DOCTYPE html>
<html>
<head>
   <title>GameDataBase-CPSC-471</title>
     <link href="aladincss.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container1">
   <h1>
   Search
   </h1>
      <div>
         <form action = "searchGames.php" method = "post">
            <input type = "text" name = "game" placeholder="Search Games" />
            <button type = "submit">Submit!</button>
         </form>
      </div>
      <div>
         <form action = "searchDevelopers.php" method = "post">
            <input type = "text" name = "developer" placeholder="Search Developers"/>
            <button type = "submit">Submit!</button>
         </form>
   </div>
   <div>
         <form action = "searchPCs.php" method = "post">
            <input type = "text" name = "pc" placeholder="Search Playable Characters"/>
            <button type = "submit">Submit!</button>
         </form>
      </div>
      <div>
         <form action = "searchPlatforms.php" method = "post">
            <input type = "text" name = "platform" placeholder="Search Platforms"/>
            <button type = "submit">Submit!</button>
         </form>
      </div>
      <div>
         <form action = "searchPublishers.php" method = "post">
            <input type = "text" name = "publisher" placeholder="Search Publishers" />
            <button type = "submit">Submit!</button>
         </form>
      </div>
      <div>
         <form action = "searchTags.php" method = "post">
            <input type = "text" name = "game" placeholder = "Search Tags"/>
            <button type = "submit">Submit!</button>
         </form>
      </div>
   </div>

<div class="container2">
   <div id="slider"> 
      <div class="slides">

      <!-- First slide --> 
               <div class="slider">
                  <div class="legend"></div> 
                     <div class="content"> 
                        <div class="content-txt"> 
                            <h1>
                            <?php
                            echo $_SESSION['login_user'] 
                           ?>'s Profile
                           </h1>
                            <h2>
                            How are you today? 
                           <p>Today's Date: <span id="datetime"></span></p>
                           <script>
                           var dt = new Date();
                           document.getElementById("datetime").innerHTML = dt.toLocaleDateString() +" " +dt.toLocaleTimeString();
                           </script>
                           </h2>
                       </div> 
                     </div> 
                  <div class="images"> 
                  <img src="IMG/slide1.png"> 
                  </div> 
            </div> 

      <!-- Second slide --> 
      <div class="slider">
         <div class="legend"></div> 
            <div class="content"> 
               <div class="content-txt"> 
                  <h1> Your Current Community Score</h1> 
                  <h2>
                     <p> Community Score: 
                        <?php
                        echo myScore();
                        ?>
                     </p>
               </h2>
            </div> 
            </div> 
            <div class="images"> 
               <img src="IMG/slide2.png"> 
            </div> 
         </div> 

      <!--3rd Slide-->
      <div class="slider">
         <div class="legend"></div> 
            <div class="content"> 
               <div class="content-txt"> 
                  <h1> News</h1> 
               </div> 
            </div> 
         <div class="images"> 
            <img src="IMG/slide3.png"> 
         </div> 
      </div> 
   </div>
</div>
</div>

<h1>
   Top Articles
   <h2>Random Title</h2>
   <h3>
      Lorem ipsum dolor sit amet, ut numquam evertitur per, mea ne sumo enim, at has putant dictas. Graece eripuit usu ad, mei amet recusabo consequat in, quidam blandit sit ei. Duo ea reque homero omittam, qui velit dicit cu. Ut has aliquip mnesarchum. Esse natum putant pro id.
   </h3>
      <h2>Random Title#2</h2>
   <h3>
      Lorem ipsum dolor sit amet, ut numquam evertitur per, mea ne sumo enim, at has putant dictas. Graece eripuit usu ad, mei amet recusabo consequat in, quidam blandit sit ei. Duo ea reque homero omittam, qui velit dicit cu. Ut has aliquip mnesarchum. Esse natum putant pro id.
   </h3>
      <h2>Random Title#3</h2>
   <h3>
      Lorem ipsum dolor sit amet, ut numquam evertitur per, mea ne sumo enim, at has putant dictas. Graece eripuit usu ad, mei amet recusabo consequat in, quidam blandit sit ei. Duo ea reque homero omittam, qui velit dicit cu. Ut has aliquip mnesarchum. Esse natum putant pro id.
   </h3>

</h1>

</body>
</html>
<?php 
   include('footer.php') 
?>