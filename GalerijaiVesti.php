<?php
    require_once 'database.php';
    require_once 'navbar.php';
    $msg = '';
    if(isset($_POST['uploadV'])){
        $ime = $_POST['name'];
        $opis= $_POST['text'];
        $target="Slikee/".basename($_FILES['image']['name']);
        $slika=$_FILES['image']['name'];
        
        if(empty ($ime) || empty($opis) || empty($slika)){
            echo "<script>alert('Niste uneli vest!')</script>";
        }
        else{
             $sql="INSERT INTO vesti (ime,opis,slika,datum) VALUES('$ime','$opis','$slika',NOW()) ";
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                $msg="Slika je uspesno uplodovana";
            }            
            else{
                $msg="Postoji neka greska";
            }
            if($conn->query($sql)===TRUE){
                echo "";
            }
            else{
                echo "Greska:" .$sql . "<br>".$conn->error;            }
            }
       }
       else if (isset($_POST['uploadG'])){
            $target = "Slikee/".basename($_FILES['image']['name']);
            $slika=$_FILES['image']['name'];

            if(empty ($slika)){
                echo "<script>alert('Niste odabrali sliku!')</script>";
                exit();
            }
            else{
                $sql= "INSERT INTO galerija (fotografija) VALUES ('$slika');";
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                    $msg="Slika je uspesno uplodovana";
                }
                else{
                    $msg="Postoji greska prilikom uplodovanja slike";
                }
            }
            if($conn->query($sql) == TRUE){
                echo '';
            }
            else{
                echo "Greska:" .$sql . "<br>".$conn->error;            
            }
    }         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerija i Vesti</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="dodaj">
   <div class="levi">
<form action="" method="POST"  enctype="multipart/form-data">
<h1>Unesi vest:</h1>
   <input type="hidden" name="size" value="1000000"><br>
   <input type="text" name="name" placeholder="Ime vesti"><br> 
    <textarea name="text" cols="40" rows="4" placeholder="Opis.."></textarea><br>
    <input name="date" type="hidden">  
    <input type="file" name="image" accept=".jpg,.jpeg,.png"><br><br>
    <button type="submit" name="uploadV">Dodaj</button> 
 </form>
</div> 
  <div class="desni">
   <form action="" method="POST"  enctype="multipart/form-data">
    <h1>Unesi sliku u galeriju:</h1><br><Br>      
        <input type="file" name="image" accept=".jpg,.jpeg,.png">
        <br><br>
        <button type="submit" name="uploadG">Dodaj</button> 
  </form> 
 </div> 
</div> 
</body>
</html>