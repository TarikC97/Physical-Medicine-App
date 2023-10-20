<?php
require_once 'sign-up.php';
require_once 'database.php';

if(isset($_POST['submit'])){
    $email = $_GET['email'];
    $key = $_POST['verKod'];

    if(emptyInput($key)){
        header("location:verifikacija.php?error=emptyInput&email=".$email."");
        exit();
    }
    if($key == PronadjiKod($conn,$email)){
        $sql = "UPDATE korisnici SET verified = 'True' WHERE Email='$email'";
        if($conn->query($sql)===TRUE){
            header("location:login.php?UspesnoVerifikovan!");
        }
        else{
            echo "Error updating record: " .$conn->error;
        }
    }
    else{
        header("location:verifikacija.php?error=pogresan&email=".$email."");
        exit();
    }

}