<?php
    require_once 'database.php';
    require_once 'navbar.php';

if(isset($_GET['update'])){
    $id=$_GET['update'];
    $sql = "SELECT * FROM korisnici WHERE id='$id'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $ime=$row['Ime'];
            $prezime=$row['Prezime'];
            $email=$row['Email'];
            $datum=$row['datum'];
            $drzava=$row['drzava'];
            $mesto=$row['mesto'];
            $telefon=$row['telefon'];
            $jmbg=$row['jmbg'];
        }
    }
    else{
        echo 'Greska prilikom uzimanja podataka korisnika!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updejtuj Pacijenta</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="dodaj">
   <div class="sign-up-dodaj">
    <form action="" method="POST" >
        Ime:<br>
        <input type="text" name="ime" value=<?php echo $ime ?>><br>
        Prezime:<br>
        <input type="text" name="prezime" value=<?php echo $prezime ?>><br>
        Email:<br>
        <input type="text" name="email" value=<?php echo $email?>><br>
        Datum rodjenja:<br>
        <input type="date" name="datum" value=<?php echo $datum ?>  ><br>
        Drzava rodjenja:<br>
        <input type="text" name="drzava" value=<?php echo $drzava ?>><br>
        Mesto rodjenja:<br>
        <input type="text" name="mesto" value=<?php echo $mesto ?>><br>
        Kontakt:<br>
        <input type="text" name="telefon" value=<?php echo $telefon?>><br>
        JMBG:<br>
        <input type="text" name="jmbg" value=<?php echo $jmbg?>><br>
        <button type="submit" name="updateBtn">Update</button>
    </form>
   </div>
 </div>
</body>
</html>

<?php
        require_once 'database.php';

        if(isset($_POST['updateBtn'])){
            $imeNovo=$_POST['ime'];
            $prezimeNovo=$_POST['prezime'];
            $emailNovi=$_POST['email'];
            $datumNovi=$_POST['datum'];
            $drzavaNova=$_POST['drzava'];
            $mestoNovo=$_POST['mesto'];
            $telefonNovi=$_POST['telefon'];
            $jmbgNovi=$_POST['jmbg'];
            
            if(isset($_GET['update'])){
                $idUser=$_GET['update'];
                $sql="UPDATE korisnici 
                SET Ime='$imeNovo',Prezime='$prezimeNovo',Email='$emailNovi',datum='$datumNovi',
                drzava='$drzavaNova',mesto='$mestoNovo',telefon='$telefonNovi',jmbg='$jmbgNovi'
                WHERE id='$idUser'";
                if($conn->query($sql)===TRUE){
                    echo '';               
                }
                else{
                    echo 'Nije doslo do promene podataka korisnika zbog greske';
                }
            }
        }
?>