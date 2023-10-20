<?php

function emptyInputSignup($ime,$prezime,$email,$pol,$sifra,$potvrda,$datum,$drzava,$mesto,$telefon,$jmbg){
    $result='';
    if(empty($ime) || empty($prezime) || empty($email) || empty($pol) || empty($sifra) || empty($potvrda) || empty($datum) ||empty($drzava) || empty($mesto)|| empty($telefon)|| empty($jmbg))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidName($ime){
    $regex ="/^[a-zA-Z]*$/";
    if(!preg_match($regex,$ime)){
        $result= true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidLastName($prezime){
     $regex="/^[A-Za-z]*$/";
    if(!preg_match($regex, $prezime)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
 } 
 function invalidEmail($email){
     $regex="/^[a-z]+[a-z0-9_.-]*[\d a-z]@([a-z]+\.)+[a-z]+$/";
    if(!preg_match($regex, $email )){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
 }
function jakaSifra($sifra){
    $result='';
    $uppercase = preg_match('@[A-Z]@', $sifra);
    $lowercase = preg_match('@[a-z]@', $sifra);
    $number    = preg_match('@[0-9]@', $sifra);
    if(!$uppercase || !$lowercase || !$number || strlen($sifra) < 10){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function passMatch($sifra,$potvrda){
    $result='';
    if($sifra !== $potvrda ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidPhoneNumber($telefon){
    $regex="/^[0-9]{10}$/";
   if(!preg_match($regex, $telefon )){
       $result=true;
    }   
   else{
       $result=false;
   }
   return $result;
} 
function invalidJMBG($jmbg){
    $regex="/^[0-9]{13}$/";
   if(!preg_match($regex, $jmbg )){
       $result=true;
    }   
   else{
       $result=false;
   }
   return $result;
}    
function emptyInputLogIn($ime,$sifra){
    $result='';
    if(empty($ime) || empty($sifra) )
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function emptyInput($kod){
    if(empty($kod)){
        return true;
    }
    return false;
}
function sendmail($to, $nameto, $subject, $message, $altmess) {
    $from  = "fizikalnamedicina97@gmail.com	";
    $to= "fizikalnamedicina97@gmail.com	";
    $namefrom = "Tarik";
    $mail = new PHPMailer();
    $mail->isSMTP();   // by SMTP
    $mail->isHTML();   // by HTML
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth   = "true";  
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->Username   = $from;
    $mail->Password   = "azjjqsrvtiqvgbju"; 
    $mail->Subject  = $subject;
    $mail->setFrom($from);   // From (origin)
    $mail->Body = $message;
    $mail->addAddress($to);
    return $mail->send();
}