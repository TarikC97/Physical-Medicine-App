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
    <title>Karton</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="kartondiv">
    <h1>Moj karton:</h1><br><br>
    <h3><?php echo $imeP ." " . $prezimeP ?></h3><br>
        <?php
            $sql ="SELECT * FROM karton WHERE pacijentk_id='$idP'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    ?>
                <div class="karton">
                <?php echo 'Datum:'. " " .$row['datum'] .'<br>' . 'Razlog lecenja:'
                    ." " .$row['razlog'] .'<br>' . 'Terapija:' ." ". $row['lecenje'];
                    ?>
                </div>
                <?php
                }
            }
        else{
            echo '<h1>Pacijent'. " ".$imeP ." ". $prezimeP. ' trenutno nema karton.</h1>';
        }
        ?>    
</body>
</html>