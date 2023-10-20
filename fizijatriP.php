<?php
    require_once 'database.php';
    require_once 'navbar.php';

    if(isset($_POST['id_fizijatar'])){
        $idF=$_POST['id_fizijatar'];
        $idP=$_SESSION['id'];

        $sql1 ="SELECT id_pacijent FROM clan 
                 WHERE id_pacijent='$idP'";
        $result1=$conn->query($sql1);  

        $sql2 = "SELECT id_fizijatar FROM clan
                 WHERE  id_fizijatar ='$idF'";
        $result2=$conn->query($sql2);
        
     if($result1->num_rows > 0){
        while($row=$result1->fetch_assoc()){
            echo "<script>alert('Vec ste odabrali fizijatra!')</script>";
        }
    }
    else if($result2->num_rows >=2){
         ($row=$result2->fetch_assoc())?>
         <?php
           echo "<script>alert('Fizijatar je preopterecen pacijentima, molimo odaberite drugog.')</script>";   
     }
     else{
         $sql="INSERT INTO clan (id_pacijent,id_fizijatar) VALUES ('$idP','$idF') ";
         if($conn->query($sql)==TRUE){
            echo "<script>alert('Odabrali ste vaseg fizijatra!')</script> ";
        }
        else{
            echo "Greska prilikom odabira fizijatra";
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
    <title>Odaberi Fizijatra</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    
    <div class="fizijatriP">
    <div class="btnnaslov">
        <h1>Ovo je lista fizijatara, molim vas odaberite svog fizijatra:</h1>
    </div>
    <?php
        $sql = "SELECT * FROM korisnici WHERE tip='fizijatar'";
        $result=$conn->query($sql);    
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                echo '<form action="fizijatriP.php" method="post">';
                $idF=$row['id'];
                ?>
                <div class="kocka">
                    <?php echo $idF ." ". $row["Ime"] ." ". $row["Prezime"] ."<br>". $row["datum"] ."<br>". $row["mesto"].'<br>'  ?>
                    <img style="width:230px; height:230px;" 
                         src="<?php echo "ProfilneSlike/" .$row["slike"]?>">
                         <?php echo "<input type='hidden' name='id_fizijatar' value=$idF>"?>
                         <button class="btn1"type="submit">Odaberi fizijatra</button>
                </div>
                <?php
                echo '</form>';
            }
        }
    else{
        echo 'Ne radi nesto dobro';
    }
    ?>
    </div>
</body>
</html>
