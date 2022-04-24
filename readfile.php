<?php
include("connection.php");
?>

<!doctype html>
<html>
  <head>
    <title>Video Upload database</title>
  </head>
  <body>
    <div>
 
     <?php
     $fetchVideos = mysqli_query($connection, "SELECT * FROM account2 ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
       $name = $row['name'];
       echo "<div style='float: left; margin-right: 5px;'>
          <video src='".$location."' controls width='320px' height='320px' ></video>     
          <br>
          <span>".$name."</span>
       </div>";
     }
     ?>
 
    </div>

  </body>
</html>