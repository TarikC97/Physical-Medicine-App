<?php include_once 'header.php'; ?>
<?php $email = $_GET['email']; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="main.css">    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikacija</title>
</head>
<body>
    <div class="vkey">   
        <form class="vform" action="verifikovan.php?email=<?php echo"".$email?>" method="POST">
            <h1>Unesite vas verifikacioni kod, radi daljeg pristupanja sajtu!</h1><br>
            <input type="text" id="verKod" name="verKod" placeholder="Unesite kod ovde"><br>
            <input type="submit" id="submit" name="submit" value="Verifikuj">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInput"){
                        echo'Popunite ovo polje!';
                    }
                    if($_GET["error"] == "pogresan"){
                        echo'Pogresan verifikacioni kod !';
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>
<?php include_once 'footer.php'; ?>

