<?php
        require 'database.php';
        require 'signupFunctions.php';
        require_once 'class.phpmailer.php';
        require_once 'class.smtp.php';

    if(isset($_POST['register'])){
        $ime = $_POST['ime'];
        $prezime =$_POST['prezime'];
        $email = $_POST['email'];
        $pol =$_POST['pol'];
        $sifra =$_POST['sifra'];
        $potvrda = $_POST['potvrda'];
        $datum = $_POST['datum'];
        $drzava = $_POST['drzava'];
        $mesto = $_POST['mesto'];
        $telefon = $_POST['telefon'];
        $jmbg = $_POST['jmbg'];
        $tip = $_POST['tip'];

        $target="ProfilneSlike/".basename($_FILES['img']['name']);
        $slika=$_FILES['img']['name'];

        if(emptyInputSignup($ime,$prezime,$email,$pol,$sifra,$potvrda,$datum,$drzava,$mesto,$telefon,$jmbg,$slika) !== false){
            header('location:signup.php?error=emptyinput');
            exit();
        }
        if(invalidName($ime) !== false){
            header('location:signup.php?error=invalidName');
            exit();
        }
        if(invalidLastName($prezime) !== false){
             header('location:signup.php?error=InvalidLastname');
             exit();
        }
        if(invalidEmail($email) !== false){
              header('location:signup.php?error=invalidEmail');
              exit();
          }
        if(jakaSifra($sifra)!== false){
            header('location:signup.php?error=weakPassword');
            exit();
        }
        if(passMatch($sifra,$potvrda) !== false){
            header('location:signup.php?error=passwordsDontmatch');
            exit();
        }
        if(invalidJMBG($jmbg)!==false){
            header('location:signup.php?error=invalidJmbg');
            exit();
        }
        if(invalidPhoneNumber($telefon)!==false){
            header('location:signup.php?error=invalidnumber');
            exit();
        }
        $hashedSifra = password_hash($sifra,PASSWORD_DEFAULT);
        $key = substr(md5(time().$jmbg),0,10);
        $sql = "INSERT INTO korisnici (Ime,Prezime,Email,Pol,sifra,datum,drzava,mesto,telefon,jmbg,tip,slike,vkey) 
        VALUES ('$ime','$prezime','$email','$pol','$hashedSifra','$datum','$drzava','$mesto','$telefon','$jmbg','$tip','$slika','$key')";        
        if($conn->query($sql) == true){
            $last_id=mysqli_insert_id($conn); 
        }
        if($tip == 'admin'){
            $messageee = "<h1>Dobrodosli na nas sajt!</h1><br>
            <h3>Vas verifikacioni kod je: ".$key."<br>
            Link ispod vas vodi do stranice gde treba da upisete vaš verifikacioni kod.<br>
            <a href='http://localhost/FizikalnaMedicina/verifikacija.php?'>Klikni!</a></h3>";     

           $headers = "MIME-Version: 1.0" . "\r\n";
           $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           $headers .= 'From: <fizikalnamedicina97@gmail.com' . "\r\n";
           $headers .= 'Cc: ' . $to . '' . "\r\n";
           $emailSent = sendmail($to, $ok, "Nalog", $messageee,  $headers);
           if ($emailSent) {
           header("location:verifikacija.php?email=".$email);
           exit();
           } else {
           echo '<h1 style="text-align:center;">Došlo je do greške! Email nije poslat! Pokušajte ponovo!</h1>';
           }   
        } 
        if($tip == 'pacijent'){
                $sql = "INSERT INTO pacijent (korisnici_id,ime,prezime,Email) VALUES('$last_id','$ime','$prezime','$email')";
                if($conn->query($sql)== true){
                    header('location:login.php?UspesnoRegistrovanjePacijenta!');
                    exit ();
                 }
            }
        elseif($tip == 'fizijatar'){
                $sql = "INSERT INTO fizijatar (korisnici_id,ime,prezime,Email) VALUES('$last_id','$ime','$prezime','$email')";
                if($conn->query($sql)== true){
                    header('location:login.php?UspesnoRegistrovanjeFizijatra!');
                    exit ();
                 }
        }           
            if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
                $msg="Fotografija je uspesno uploadovana";
            } else{
                $msg="Postoji greska pri uploadovanju fotografije";
            }
}    
function PronadjiKod($conn,$email){
        $sql="SELECT vkey FROM korisnici WHERE Email = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            return $row['vkey'];
            }
        }               
}

