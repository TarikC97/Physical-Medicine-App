<?php
    require_once 'database.php';
    require_once 'navbar.php';
    $imeP =$_SESSION['Ime'];
    $prezimeP =$_SESSION['Prezime'];

    if(isset($_POST['promeni'])){
        $idP=$_SESSION['id'];
        $sql="SELECT * FROM clan WHERE id_pacijent='$idP'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                if($conn->query($sql)){
                    echo '<h1 class="h1d">Pacijent '." ".$imeP." ".$prezimeP." je poslao zahtev za promenu fizijatra." .'</h1>'; 
                }
            
            }
        }
        else{
            echo '<h1 class="h1d">Morate prvo imati fizijatra da bi ste zatrazili promenu!</h1>';
        }
        $idP2=$_SESSION['id'];
        $sql2="UPDATE korisnici SET zahtev='da' WHERE id='$idP2'";//zahtev = 'da' oznacava da je zahtev poslat!
        if($conn->query($sql2)===TRUE){
            echo ''; 
        }
        else{
            echo 'Greska prilikom updejtovanja zahteva u bazi';
        }
    }