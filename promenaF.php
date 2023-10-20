<?php
    require_once 'database.php';
    require_once 'navbar.php';

    if(isset($_GET['odobri'])){
        $idP=$_GET['odobri'];
        $sql="DELETE FROM clan WHERE id_pacijent='$idP'";
        if($conn->query($sql)){
            echo '<h1 class="h1d">Pacijentu :'." ".$idP." je odobren zahtev za promenu fizijatra." .'</h1>'; 
        }
        else{
            echo '<h1 class="h1d">Greska prilikom odabravnja zahteva pacijentu.</h1>'; 
        }
        $sql2="UPDATE korisnici SET zahtev='ne' WHERE id='$idP'";
        if($conn->query($sql2)){
            echo '';
        }
    }
    elseif(isset($_GET['odbij'])){
        $idP=$_GET['odbij'];
        $sql ="UPDATE korisnici SET zahtev ='ne' WHERE id='$idP'";
        if($conn->query($sql)){
            echo '<h1 class="h1d">Pacijentu :'." ".$idP." je odbijen zahtev za promenu fizijatra." .'</h1>'; 
        }
        else{
            echo '<h1 class="h1d">Greska prilikom odabravnja zahteva pacijentu.</h1>'; 
        }
    }