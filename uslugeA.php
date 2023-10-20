<?php include 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usluge</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="uslugeA">
  <div class="uslugeAdmin">
   <div class="sign-up-dodaj">
    <form action="usluge.php" method="POST"  enctype="multipart/form-data">
        <h1 style="margin-left:50px;">Unesi uslugu:</h1>      
            <input type="hidden" name="size" value="1000000">
            <input style="margin-left:50px;"type="text" name="name" placeholder="Ime usluge">   
            <textarea style="margin-left:50px;"name="text" cols="40" rows="4" placeholder="Opis.."></textarea>  
            <input style="margin-left:50px;"type="file" name="image" accept=".jpg,.jpeg,.png"><br>
            <button style="margin-left:50px;"type="submit" name="upload">Prosledi</button>
        </form>
        </div>
       </div>
    </div>
</body>
</html>
<?php
require 'database.php';
     $msg = '';
     if(isset($_POST['upload'])){         
         $target = "Slikee/".basename($_FILES['image']['name']);
         $image = $_FILES['image']['name'];
         $text = $_POST['text'];
         $name = $_POST['name'];
         if(empty($name) || empty ($text) || empty($image)){
            echo "<script>alert('Molimo vas da popunite sva polja.')</script>";
            exit();
         }
         $sql = "INSERT INTO slike (image,text,name) VALUES('$image','$text','$name')";
         
         if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
             $msg = "Slika uspesno uplodovana";
         } else{
             $msg = "Slika nije uplodovana";
         }
         if($conn->query($sql) === True){
            header('location:usluge.php');
         }
         else{
            echo 'Neuspela konekcija!';
         }
     }
     ?>