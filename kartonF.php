<?php
    require_once 'database.php';
    require_once 'navbar.php';
    $idF=$_SESSION['id'];
  if(isset($_POST['kartonPacijenta'])){
        $pacijentk=$_POST['pacijent'];
        $fizijatark=$_SESSION['id'];
        $datum =$_POST['datum'];
        $razlog =$_POST['razlog'];
        $lecenje=$_POST['lecenje'];

        if(empty($datum)|| empty ($razlog) || empty ($lecenje)){
            echo "<script>alert('Molim vas da popunite sva polja.')</script>";
        }
        else{
            $sql="INSERT INTO karton (pacijentk_id,fizijatark_id,datum,razlog,lecenje) 
                  VALUES ('$pacijentk','$fizijatark','$datum','$razlog','$lecenje')";
            if($conn->query($sql) === TRUE){
                echo "<script>alert('Karton je uspesno popunjen za pacijenta $pacijentk')</script>";
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
    <title>Karton</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="kartonMain">
        <div class="kartonKocka">
            <form action="kartonF.php" method="POST">
            <h1>Unesite podatke u karton</h1>
            <p>Odaberite vaseg pacijenta:</p><br>
            <select name="pacijent" style="height:30px; width: 165px;">
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
            <textarea name="razlog" placeholder="Razlog dolaska"></textarea><br>
            <textarea name="lecenje" placeholder="Lecenje"></textarea><br>
            <button type="submit" name="kartonPacijenta" style="height:30px; width: 180px;">Unesi</button>
        </form>
        </div>
    </div>
    
</body>
</html>