<?php
 require 'database.php';
 require 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Fizijatra</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="dodaj">
    <div class="sign-up-dodaj">
        <form action="sign-up.php" method="post" enctype="multipart/form-data">
        Ime:<br>
        <input type="text" name="ime"><br>
        Prezime:<br>
        <input type="text" name="prezime"><br>
        Email:<br>
        <input type="email" name="email"><br>
        Pol:<br>
        <select name="pol" id="">
            <option>Muski</option>
            <option>Zenski</option>
        </select><br>
        Sifra:<br>
        <input type="password" name="sifra"><br>
        Potvrdite sifru:<br>
        <input type="password" name="potvrda"><br>
        Datum rodjenja:<br>
        <input type="date" name="datum" min="1970-12-31" max="2013-12-31"><br>
        Drzava rodjenja:<br>
        <input type="text" name="drzava"><br>
        Mesto rodjenja:<br>
        <input type="text" name="mesto"><br>
        Kontakt:<br>
        <input type="text" name="telefon"><br>
        JMBG:<br>
        <input type="text" name="jmbg"><br>
        <input type="file" name="img"><br>
        Prijavi me kao:<select name="tip">
                        <option value="fizijatar">Fizijatra</option>
        </select><br>
        <button type="submit" name="register">Registruj se</button>
    </form>
<?php
        if(isset($_GET['error'])){
            if($_GET['error']=='emptyinput'){
                echo "<p>Popunite sva polja!";
            }
            elseif($_GET['error']=='invalidName'){
                echo '<p>Unesite drugo Ime!';
            }
            elseif($_GET['error']=='invalidLastName'){
                echo '<p>Odaberite drugo prezime!';
            }
            elseif($_GET['error']=='invalidEmail'){
                echo '<p>Odaberite drugi email!';
            }
            elseif($_GET['error']=='weakPassword'){
                echo '<p>Odaberite jacu sifru!';
            }
            elseif($_GET['error']=='passwordsDontmatch'){
                echo '<p>Unete sifre se ne poklapaju!';
            }
            elseif($_GET['error']=='stmtfailed'){
                echo '<p>Nesto nije u redu,pokusajte ponovo!';
            }
           elseif($_GET['error']=='invalidnumber'){
            echo '<p>Broj telefona mora sadrzati 10 cifara!';
           }
            elseif($_GET['error']=='invalidJmbg'){
            echo '<p>Maticni broj mora sadrzati 13 cifara!';
           }
            elseif($_GET['error']=='none'){
               echo '<script>alert<p>Uspesno ste se registrovali!</script>';
            }
        }
            ?>
    </div>
 </div>
</body>
</html>