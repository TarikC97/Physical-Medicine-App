<?php
include 'header.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usluge</title>
    <link rel="stylesheet" href="main.css">    
    <link rel="stylesheet" href="style.css">
    <style>
    <?php include 'main.css'; ?>
    </style>  
</head>
<body>
<div class="uslugeMain">
<?php
      require_once 'database.php';
      $sql = "SELECT * FROM slike";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($result)){
          echo '<div class="uslugeCentar">';
          echo "<div class ='uslugeLevo'>";
          echo "<img src='Slikee/".$row['image']."'>";
          echo '</div>';
          echo "<div class = 'uslugeDesno'>";
          echo '<h1>'.$row['name']. '</h1>';
          echo "<p>".$row['text']. "</p>";
          echo "</div>";
          echo '</div>';
      }
?> 
</div> 
</body>
</html>
