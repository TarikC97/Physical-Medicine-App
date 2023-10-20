<?php
    require_once 'navbar.php';
    require_once 'database.php';

    $sql="SELECT * FROM fizijatar ";
        $result=$conn->query($sql);
        //Paran id
        if($result->num_rows>0){
            while($row=$result->fetch_assoc())
            {
             if($row['korisnici_id']%2==0){ 
                    $paran=$row['korisnici_id'];
                    $radnaSmena='Prva smena';
                    $vikendSmena='Ne radite';

        $sql1= "UPDATE fizijatar SET radnaSmena='$radnaSmena',vikendSmena='$vikendSmena'
        WHERE korisnici_id='$paran'";

                    if($conn->query($sql1)===TRUE){
                        echo "";
                    }
                    else{
                        echo 'Greska prilikom unosenja podataka u bazu. ';
                    }
                 }
                 //Neparan id
                 else{
                    $neparan=$row['korisnici_id'];
                    $radnaSmena='Druga smena';
                    $vikendSmena='Prva smena';
                    
                    $sql2="UPDATE fizijatar
                    SET radnaSmena='$radnaSmena',vikendSmena='$vikendSmena' WHERE korisnici_id='$neparan'";
                    if($conn->query($sql2)===TRUE){
                        echo "";
                     }
                    else{
                        echo 'Greska prilikom unosenja podataka u bazu. ';
                    }
              }
          }
        }//Prazna tabela fizijatri.
          else{
               echo '<h1>Trenutno nema dostupnih fizijatara.</h1>';
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raspored Fizijatara</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="mainA">
        <h2 style="margin-left:10px">Raspored fizijatara:</h2>
        <?php
            $sql="SELECT * FROM fizijatar ";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                ?>
                <table class="tabela">
                 <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>PONEDELJAK</th>
                    <th>UTORAK</th>
                    <th>SREDA</th>
                    <th>CETVRTAK</th>
                    <th>PETAK</th>
                    <th>SUBOTA</th>
                    <th>NEDELJA</th>
                </tr>
                <?php
                while($row=$result->fetch_assoc()){
                     ?>
                    <tr>
                    <td><?php echo $row['korisnici_id']?></td>
                    <td><?php echo $row['ime']?></td>
                    <td><?php echo $row['prezime']?></td>
                    <td><?php echo $row['radnaSmena'] ?></td>
                    <td><?php echo $row['radnaSmena'] ?></td>
                    <td><?php echo $row['radnaSmena'] ?></td>
                    <td><?php echo $row['radnaSmena'] ?></td>
                    <td><?php echo $row['radnaSmena'] ?></td>
                    <td><?php echo $row['vikendSmena'] ?></td>
                    <td><?php echo $row['vikendSmena'] ?></td>
                    </tr>
                <?php
            }   
            ?>
        </table>
        <?php
        }
        else{
            echo '<h1 class="h1d">Trenutno ne postoji raspored za fizijatre.</h1>';
        }
     ?>
    </div>
</body>
</html>