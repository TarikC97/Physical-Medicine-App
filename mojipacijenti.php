<?php
    require 'database.php';
    require 'navbar.php';
    $idF = $_SESSION['id'];
    $imeFizijatra=$_SESSION['Ime'];
    $prezimeFizijatra=$_SESSION['Prezime'];
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
    <div class="mainA">
    <h2 style="margin-left: 10px;">Moji pacijenti:</h2>
    <?php
        $sql = "SELECT *
        FROM fizijatar
        JOIN clan
        ON fizijatar.korisnici_id = clan.id_fizijatar
        WHERE fizijatar.korisnici_id='$idF'";
        $result=$conn->query($sql);
        if($result->num_rows >0){
            ?>
            <table class="tabela">
                 <tr>
                   <th>ID MOJIH PACIJENATA</th>
             </tr>
            
            <?php
            while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['id_pacijent'] ?> </td>
                </tr>
               <?php
            }
         }
         else{           
            echo '<h1>Fizijatar trenutno nema pacijente.</h1>';
        }
         ?>
        </table> 
        <?php
    ?>
    </div>
</body>
</html>
