<?php
    require_once 'database.php';
    require_once 'navbar.php';

    if(isset($_GET['odobripacijent'])){
        $id=$_GET['odobripacijent'];
        $sql="UPDATE korisnici SET dozvola='odobren' WHERE id='$id'";
        if($conn->query($sql)===TRUE){
            echo '<h1 class="h1d">Korisnik pod rednim brojem:'." ".$id." je odobren od strane Admina."  .'</h1>';               
        }
        else
        {
            echo 'Greska prilikom odobravanja korisnika';
        }
    }
    elseif(isset($_GET['odobrifizijatar'])){
        $id=$_GET['odobrifizijatar'];
        $sql="UPDATE korisnici SET dozvola='odobren' WHERE id='$id'";
        if($conn->query($sql)===TRUE){
            echo '<h1 class="h1d">Korisnik pod rednim brojem:'." ".$id." je odobren od strane Admina."  .'</h1>';               
        }
        else
        {
            echo 'Greska prilikom odobravanja korisnika';
        }
    }
    // elseif(isset($_GET['odobriadmin'])){
    //     $id=$_GET['odobriadmin'];
    //     $sql="UPDATE korisnici SET dozvola='odobren' WHERE id='$id'";
    //     if($conn->query($sql)===TRUE){
    //         echo '<h1 class="h1d">Korisnik pod rednim brojem:'." ".$id." je odobren od strane Admina."  .'</h1>';               
    //     }
    //     else
    //     {
    //         echo 'Greska prilikom odobravanja korisnika';
    //     }
    // }
    elseif(isset($_GET['odbij'])){
        $id=$_GET['odbij'];
        $sql="DELETE FROM korisnici WHERE id ='$id'";
        if($conn->query($sql)===TRUE){
            echo '<h1 class="h1d">Korisnik pod rednim brojem:'." ".$id." je odbijen od strane Admina."  .'</h1>';
        }
        else
        {
            echo 'Greska prilikom uklanjanja korisnika.';
        }
    }