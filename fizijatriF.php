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
    <title>Fizijatri</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="fizijatriP">
    <?php
        $sql = "SELECT id,Ime,Prezime,datum,mesto,slike,tip FROM korisnici WHERE tip='fizijatar'";
        $result=$conn->query($sql);
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                ?>
                <div class="kocka">
                    <?php echo $row['id']." ".$row["Ime"] ." ". $row["Prezime"] ."<br>". $row["datum"] ."<br>". $row["mesto"].'<br>'  ?>
                    <img style="width:250px; height:250px;" 
                         src="<?php echo "ProfilneSlike/" .$row["slike"]?>">
                </div>
                
                <?php
            }
        }
    else{
        echo 'Ne radi nesto dobro';
    }
    ?>
</body>
</html>