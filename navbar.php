<?php
    require_once 'database.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korisnici</title>
    <style>
    <?php include 'main.css'; ?>
    </style> 
</head>
<body>
     <?php
    if(isset($_SESSION['id'])){
        $tip = $_SESSION['tip'];
        $ime = $_SESSION['Ime'];
        $prezime = $_SESSION['Prezime'];
        $slike=$_SESSION['slike'];
        if($tip == 'pacijent'){
            ?>  
            <div class="main">
            <div class="sideleft">
            <img style="display:block; width:77px;  height:77px; margin:13px auto; border-radius:50%;"
             src=<?php echo "ProfilneSlike/" . $slike?>>             
            <?php  echo '<h2>'. $ime . " " . $prezime  .'</h2>'  ?>
            <h2>Pacijent</h2>
            <a href="index.php">Pocetna</a>
            <a href="pacijent.php">Profil</a>
            <a href="fizijatriP.php">Fizijatri</a>
            <a href="mojkarton.php">Moj Karton</a>
            <a href="mojeporuke.php">Moje poruke</a>
            <a href="logout.php">Odjavi se</a>
            </div>
            <?php
        }
        if($tip == 'fizijatar'){
            ?>
            <div class="main">
            <div class="sideleft">
            <img style="display:block; width:77px;  height:77px; margin:13px auto; border-radius:50%;"
            src=<?php echo "ProfilneSlike/".$slike ?>> 
            <?php echo '<h2>'.$ime . " " .$prezime . '</h2>'?>
            <h2>Fizijatar</h2>
            <a href="index.php">Pocetna</a>
            <a href="fizijatar.php">Profil</a>
            <a href="mojipacijenti.php">Moji pacijenti</a>
            <a href="fizijatriF.php">Fizijatri</a>
            <a href="porukaF.php">Posalji poruku</a>
            <a href="kartonF.php">Karton pacijenta</a>
            <a href="terminiF.php">Zakazite termin</a>
            <a href="GalerijaiVesti.php">Galerija i vesti</a>
            <a href="logout.php">Odjavi se</a>
            </div>
            <?php
        }
    if($tip == 'admin'){
        ?>
        <div class="main">
        <div class="sideleft">
        <img style="display:block; width:77px;  height:77px; margin:13px auto; border-radius:50%; "
        src=<?php echo "ProfilneSlike/". $slike ?>> 
        <?php echo '<h2>' . $ime ." " .$prezime . '</h2>'?>
        <h2>Admin</h2>
        <a href="index.php">Pocetna</a>
        <a href="upravljanjeA.php">Upravljanje korisnicima</a>
        <a href="pacijenti.php">Pacijenti</a>
        <a href="fizijatri.php">Fizijatri</a>
        <a href="rasporedA.php">Raspored fizijatara</a>
        <a href="admin.php">Zahtev za registraciju</a>
        <a href="promenaFizijatraA.php">Za promenu fizijatra</a>
        <a href="uslugeA.php">Usluge</a>
        <a href="GalerijaiVesti.php">Galerija i vesti</a>
        <a href="logout.php">Odjavi se</a>
        </div>
    <?php
    }
    }
    ?>
</body>
</html>