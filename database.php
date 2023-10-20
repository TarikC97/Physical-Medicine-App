<?php

$serverName ='localhost';
$dBUserName ='root';
$dBPassword ='';
$dBName ='projekat';

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);

if(!$conn){
    die("Neuspela konekcija". mysqli_connect_error());
}