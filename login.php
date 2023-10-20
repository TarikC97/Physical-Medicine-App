<?php         
    if(isset($_POST['login'])){
        $username = $_POST['email'];
        $sifra= $_POST['sifra'];

        require_once 'database.php';
        require_once 'signupFunctions.php';

        if(emptyInputLogIn($username,$sifra) !== false){
    
            header('location:login.php?error=emptyinput');
            exit();
        }
            $sql = "SELECT * FROM korisnici WHERE Email='$username'";
            $result =mysqli_query($conn,$sql);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
                $sifra_baza = $row['sifra'];
                $proveriSifre = password_verify($sifra,$sifra_baza);
                $status=$row['dozvola'];
                $tip=$row['tip'];
                $verifikovan = $row['verified'];

        if($tip == 'pacijent'){
         
            if($proveriSifre === false){
                header('Location:login.php?error=Pogresnasifra');
            }   
            if($status !='odobren'){
                header('Location:login.php?error=KorisnikNijeOdobren');
            }
              else if($proveriSifre === true && $status ='odobren' ){
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['tip']=$row['tip'];
                $_SESSION['Ime']=$row['Ime'];
                $_SESSION['Prezime']=$row['Prezime'];
                $_SESSION['slike']=$row['slike'];
                header('Location:index.php?UspesnoLogovanje!');
              }
          }
          elseif($tip == 'fizijatar'){
            if($proveriSifre === false){
                header('Location:login.php?error=Pogresnasifra');
            }
            if($status !='odobren'){
                header('Location:login.php?error=KorisnikNijeOdobren');
            }
              else if($proveriSifre === true && $status ='odobren' ){
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['tip']=$row['tip'];
                $_SESSION['Ime']=$row['Ime'];
                $_SESSION['Prezime']=$row['Prezime'];
                $_SESSION['slike']=$row['slike'];
                header('Location:index.php?UspesnoLogovanje!');
              }
          }
          elseif($tip == 'admin'){
            if($proveriSifre === false){
                header('Location:login.php?error=Pogresnasifra');
            }
            else if($proveriSifre === true && $verifikovan == 'True' ){
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['tip']=$row['tip'];
                $_SESSION['Ime']=$row['Ime'];
                $_SESSION['Prezime']=$row['Prezime'];
                $_SESSION['slike']=$row['slike'];
                header('Location:index.php?UspesnoLogovanje!');
              }  
          }
        }       
    }
?>
<?php include_once 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main"> 
     <div class="log-in">
         <h1>Prijavi se! 
         </h1>
        <form action="login.php" method="post">
           Email:<br>
           <input type="textarea" name="email" placeholder="Unesite vas email..."><br>
           Sifra:<br>
           <input type="password" name="sifra" placeholder="Unesite sifru..."><br>
           <button type="submit" name="login">Prijavi se</button>
           <p>Nemas nalog?<a href="signup.php">Registruj se!</a></p>
        </form>
        
        <?php
        if(isset($_GET['error'])){
         if($_GET['error']=='emptyinput'){
             echo "<h1>Popunite sva polja!</h1>";
         }
        elseif($_GET['error']=='KorisnikNijeOdobren'){
            echo '<h1>Korisnik nije odobren od strane Admina!</h1>';
         }
         elseif($_GET['error']=='Pogresnasifra'){
             echo '<h1>Pogresan username ili sifra!</h1>';
         }
      
        }
        ?>
     </div>
</body>
</html>