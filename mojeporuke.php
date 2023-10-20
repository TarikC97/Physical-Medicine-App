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
    <title>MojePoruke</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="mojeporukediv">
        <h1>Poruke:</h1>
            <?php 
            $sql="SELECT * FROM poruka WHERE pacijent_ime='$idP'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    ?>
                    <div class="mojeporuke">
                            <?php echo '<h2>'.$row['naslov'] . '</h2>'?>
                            <?php echo '<p>'.$row['sadrzaj'] .'</p>' ?>
                    </div>
                    <?php
                }?>
                <?php
            } 
            else{
                echo '<h1 class="h1d">Lekar nije poslao poruku  pacijentu: '." " .$imeP." ".$prezimeP. ".</h1>";
            }
        
           ?>
           <?php
            $sql="SELECT * FROM poruke
            JOIN clan ON poruke.fizijatar_id=clan.id_fizijatar 
            WHERE id_pacijent ='$idP'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    ?>
                    <div class="mojeporuke">
                    <?php echo '<h2>'.$row['naslov'] . '</h2>'?>
                    <?php echo '<p>'.$row['sadrzaj'] .'</p>' ?>
                    </div>
                    <?php
                }?>
                <?php
            }
            else{
                echo '<h1 class="h1d"><br>'.'Odabrani lekar nije poslao poruke za  sve pacijente.';
            }
            ?>
    </div>
</body>
</html>