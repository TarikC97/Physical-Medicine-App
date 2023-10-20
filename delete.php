<?php
    require_once 'database.php';
    require_once 'navbar.php';
    
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $sql = "DELETE FROM korisnici WHERE id='$id'";
            if($conn->query($sql)===TRUE){
                echo '';
            }
            else{
                echo 'Doslo je do greske prilikom  brisanja korisnika.';
            }
 }
        
    
