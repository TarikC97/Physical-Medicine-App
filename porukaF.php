<?php
    require_once 'navbar.php';
    require_once 'database.php';

    $fizijatar=$_SESSION['id'];

    if(isset($_POST['posaljiPoruke'])){
        $naslov = $_POST['naslov'];
        $sadrzaj = $_POST['sadrzaj'];
        if(empty ($naslov) || empty ($sadrzaj)){
        echo "<script>alert('Popunite sva polja da bi ste poslali poruku!')</script>";
        }
        else{
            $sql="INSERT INTO poruke (fizijatar_id,naslov,sadrzaj) VALUES ('$fizijatar','$naslov','$sadrzaj')";
            if($conn->query($sql) === TRUE){
                echo "<script>alert('Poruke uspesno poslate pacijentima!')</script>";
            }
            else{
                echo 'Greska prilikom slanja poruka.';
            }
        }
    }
    else if(isset($_POST['posaljiPoruku'])){
        $naslov =$_POST['naslov'];
        $sadrzaj =$_POST['sadrzaj'];
        $imeP=$_POST['imeP'];
        if(empty ($naslov) || empty ($sadrzaj)){
            echo "<script>alert('Popunite sva polja da bi ste poslali poruku!')</script>";
        }
        else{
            $sql="INSERT INTO poruka (pacijent_ime,naslov,sadrzaj) VALUES ('$imeP','$naslov','$sadrzaj')";
            if($conn->query($sql)===TRUE){
                echo "<script>alert('Poruke uspesno poslata pacijentu: $imeP')</script>";
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
    <title>Poruke</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="dodaj">
        <div class="levi">
            <form action="porukaF.php" method="POST">
               <h2>Napisi poruku svim pacijentima</h2><br>
               <input type="text" name="naslov"placeholder="Naslov poruke"><br><br>
               <textarea name="sadrzaj" placeholder="Sadrzaj poruke"></textarea><br><br>
              <button type="submit" name="posaljiPoruke">Posalji</button>
            </form>
        </div>
        <div class="desni">
          <form action="porukaF.php" method="POST">
            <h2>Napisi poruku odabranom pacijentu</h2><br>
            <input type="text" name="naslov" placeholder="Naslov poruke"><br><br>
            <textarea name="sadrzaj" placeholder="Sadrzaj poruke"></textarea><br>
                <select name="imeP" style=" height:20px; width: 150px;">
                <?php
                 $sql = "SELECT *
                 FROM fizijatar
                 JOIN clan
                 ON fizijatar.korisnici_id = clan.id_fizijatar
                 WHERE fizijatar.korisnici_id='$fizijatar'";
                 $result = $conn->query($sql);
                 if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        ?>
                        <option>
                            <?php echo $row['id_pacijent'];?>
                        </option> 
                        <?php
                    }
                 }
                 ?>
                </select><br><br>
                <button type="submit" name="posaljiPoruku">Posalji</button>
          </form>
        </div>
    </div>
</body>
</html>