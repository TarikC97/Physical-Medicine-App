<?php
    require_once 'database.php';
    require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promena fizijatra</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="mainA">
        <h2 style="margin-left: 10px;">Pacijenti koji zele da promene fizijatra:</h2>
        <?php
        $sql="SELECT * FROM korisnici WHERE zahtev ='da'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            ?>
            <table class="tabela">
                <tr>
                    <th>ID</th>
                    <th>IME I PREZIME</th>
                    <th>ODOBRI/ODBIJ</th>
                </tr>
            <?php
                while($row=$result->fetch_assoc()){
                    $id=$row['id'];
                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['Ime'] ." ".$row['Prezime']?></td>    
                        <td><button class="btnu"><a href="promenaF.php?odobri=<?=$id?>">Odobri</a></button>
                            <button class="btnd"><a href="promenaF.php?odbij=<?=$id?>">Odbij</a></button>
                        </td>
                    </tr>
                    <?php
                }
                ?> 
              </table>
              <?php
            }
            else{
                echo '<h1 class="h1d">Trenutno nijedan pacijent nije zatrazio promenu fizijatra.</h1>'; 
            }
        ?>
</div>
</body>
</html>