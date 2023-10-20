<?php
 include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link href="lightbox.min.css" rel="stylesheet" type="text/css">
    <script src="lightbox-plus-jquery.min.js"></script>
    
    <title>Fizikalna medicina</title>
</head>
<body>
    
<div class="background-image">
    <div class="background-content">
        <h1>Fizikalna medicina<br> i Rehabilitacija</h1>
        <p>Najbolje usluge<br> po najnizim cenama.<br></p>
        <a href="aboutUs.php">O nama</a>
    </div>
</div>

<div class="main-about">

     <?php 
        $sql = "SELECT ime,opis,slika,datum FROM vesti";
        $result=$conn->query($sql);
        if($result->num_rows >0){
        while($row=$result->fetch_assoc()){
        ?>
        <div class="about-center">
         <div class="about-left">
            <?php echo '<h1>'.$row['ime'].'</h1>' .'<br>'. $row['opis'].'</br>' .'<br>'. $row['datum']. '</br>' ?>
         </div>
         <div class="about-right">
            <img style="height:130px; width:195px;"src=<?php echo "Slikee/".$row['slika']?>>
         </div>
        </div>
        <?php
        }
      }  
        else{
            echo 'Ne radi';
        }
        ?>
</div>
<div class="gallery">
    <h1>Galerija</h1>
    <div class="main-gallery">
        <div class="inner-gallery">
        <a href="Slikee/1.jpg" data-lightbox="galerija"><img src="Slikee/1.jpg" alt=""></a>
        </div>
        <?php
            $sql = "SELECT * FROM galerija";
            $result=$conn->query($sql);
            if($result->num_rows>0){
               while($row=$result->fetch_assoc()){
                ?>
                <div class="inner-gallery">
                    <a href="<?php echo "Slikee/".$row['fotografija']?>" data-lightbox="galerija"> <img src="<?php echo "Slikee/".$row['fotografija']?>"></a>;
                </div>
                <?php
            } 
            }
            else{
                echo 'Nema fotografija u Galeriji';
            } 
            ?>     
    </div>
</div>
<div class="our-doctors">
    <h1>Nasi najbolji fizijatri</h1>
    <div class="main-doctor">
        <div class="inner-doctor">
            <img style="width: 380px; height:300px;"src="Slikee/fiz1.jpg" alt="">
            <div class="doc-icons">
                <div class="fab fa-facebook"></div>
                <div class="fab fa-twitter"></div>
                <div class="fab fa-instagram"></div>
                <div class="fab fa-linkedin"></div>
            </div>
        </div>
        <div class="inner-doctor">
            <img style="width: 380px; height:300px;"src="Slikee/gal1.jpg" alt="">
            <div class="doc-icons">
                <div class="fab fa-facebook"></div>
                <div class="fab fa-twitter"></div>
                <div class="fab fa-instagram"></div>
                <div class="fab fa-linkedin"></div>
            </div>
        </div>
        <div class="inner-doctor">
            <img style="width: 380px; height:300px;"src="Slikee/fiz4.jpg" alt="">
            <div class="doc-icons">
                <div class="fab fa-facebook"></div>
                <div class="fab fa-twitter"></div>
                <div class="fab fa-instagram"></div>
                <div class="fab fa-linkedin"></div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
</body>
</html>