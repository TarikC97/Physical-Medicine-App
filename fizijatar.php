<?php
 require 'database.php';
 require 'navbar.php';
 $idFizijatra=$_SESSION['id'];
 $imeFizijatra=$_SESSION['Ime'];
 $prezimeFizijatra=$_SESSION['Prezime'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fizijatar</title>
    <link rel="stylesheet" href="main.css">
 </head>
 <body>
 <div class="radnastranaF">
    <?php
        $sql="SELECT * FROM fizijatar WHERE korisnici_id='$idFizijatra'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo '<h1>Smene</h1>';
            $row=$result->fetch_assoc();
                echo "Fizijatar". " ".$imeFizijatra ." ". $prezimeFizijatra. " ". "radnim danima je"." ". $row['radnaSmena'].", a vikendom"." ".$row['vikendSmena']." .";
            
        }
            else{
        echo "";
         }

        ?>
    <?php
        echo '<h1>Moji zakazani termini:</h1>';
        $sql= "SELECT * FROM termini WHERE fizijatar_termin='$idFizijatra'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                ?>
                <div class="karton">
                <?php echo 'Pacijent:'. " " .$row['pacijent_termin'] .'<br>' . 'Datum:'
                    ." " .$row['datum'] .'<br>' . 'Vreme:' ." ". $row['vreme'];
                    ?>
                </div>
                <?php
            }
        }
        else{
            echo '<h1> Trenutno fizijatar '." ".$imeFizijatra ." ".$prezimeFizijatra ." ".'nema zakazanan termin.';
        }

    ?>

 </div>
 </body>
 </html>