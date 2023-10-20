<?php
    require_once 'database.php';
    require_once 'navbar.php';
    $idF=$_SESSION['id'];
  if(isset($_POST['zakaziTermin'])){
        $pacijentT=$_POST['pacijent_termin'];
        $fizijatarT=$_SESSION['id'];
        $datum =$_POST['datum'];
        $vreme =$_POST['vreme'];

        if(empty($datum)|| empty ($vreme)){
            echo "<script>alert('Molim vas da popunite sva polja.')</script>";
        }
        else{
            $sql="INSERT INTO termini (pacijent_termin,fizijatar_termin,datum,vreme) 
                  VALUES ('$pacijentT','$fizijatarT','$datum','$vreme')";
            if($conn->query($sql) === TRUE){
                echo "<script>alert('Termin je uspesno zakazan za pacijenta $pacijentT')</script>";
            }
            else{
                echo 'Podaci nisi uneti u bazu, postoji greska!';
            }
        
        }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termini</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="kartonMain">
        <div class="kartonKocka">
            <form action="terminiF.php" method="POST">
            <h1 style="text-align: center;">Zakazite termin vasem pacijentu</h1>
            <p>Odaberite vaseg pacijenta:</p><br>
            <select name="pacijent_termin" style="height:30px; width: 165px;">
             <?php
                $sql= "SELECT * FROM fizijatar
                       JOIN clan ON fizijatar.korisnici_id=clan.id_fizijatar
                       WHERE fizijatar.korisnici_id = '$idF'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                            ?>
                                <option><?php echo $row['id_pacijent'] ?> </option>
                        <?php
                    }
                }
             ?>                            
            </select><br>
            <input type="date" name="datum" min="2022-09-21" style="height:30px; width: 160px;"><br>
            <input type="time" name="vreme" style="height:30px; width: 160px;"><br>
            <button type="submit" name="zakaziTermin" style="height:30px; width: 180px;">Zakazi</button>
        </form>
        </div>
    </div>
</body>
</html>