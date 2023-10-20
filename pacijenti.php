<?php
    require 'database.php';
    require 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moji pacijenti</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="fizijatriP">
        <div class="btnnaslov">
        <a href="dodajP.php"><button class="dodajbutton">Dodaj pacijenta</button></a>
        </div>
    <?php
        $sql = "SELECT id,ime,Ime,Prezime,datum,mesto,slike,tip FROM korisnici WHERE tip='pacijent'";
        $result=$conn->query($sql);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                ?>
                
                <div class="kocka">
                    <?php echo $row["id"]." ".$row["Ime"] ." ". $row["Prezime"] ."<br>". $row["datum"] ."<br>". $row["mesto"].'<br>'  ?>
                    <img style="width:250px; height:250px;" 
                         src="<?php echo "ProfilneSlike/" .$row["slike"]?>">
                </div>
                
                <?php
            }
        }
    else{
        echo 'Trenutno ne postoji nijedan pacijent.';
    }
    ?>
    </div>
    
</body>
</html>