<?php
    require_once 'database.php';
    require_once 'navbar.php';
    $idP=$_SESSION['id'];
    $imeP =$_SESSION['Ime'];
    $prezimeP =$_SESSION['Prezime'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacijenti</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="uslugeMainP">
        <h2>Vas odabrani fizijatar je:</h2><br>
        <?php
        $sql = "SELECT * FROM clan WHERE id_pacijent='$idP'";
        $result=($conn->query($sql));
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo 'Fizijatar pod rednim brojem'." ".$row['id_fizijatar'].".";
            }
        }
        ?>
        <form action="promenaFizijatraP.php" method="POST">
            <br><br>
            <input style="width:150px; height:30px;" type="submit" name="promeni" value="Promeni fizijatra"><br><br>
        </form>
        <h2>Kontrola kod vaseg odabranog fizijatra je :</h2>
        <?php 
            $sql="SELECT * FROM termini WHERE pacijent_termin='$idP'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    ?>
                 <div class="kontrola">
                  <?php echo 'Datum:' ." " . $row['datum'] .'<br>' . 'Kontrola:' . " " .$row['vreme']; ?>                                       
                 </div>
                <?php
                }
            }
            else{
               echo 'Pacijent' ." " .$imeP ." ". $prezimeP. " ".'trenutno nema zakazan termin.';
            }
        ?>

    </div>
</body>
</html>