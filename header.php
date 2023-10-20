<?php
    session_start();
?>
<header class="header">
         <img src="Slikee/logo.png" id="logo" alt="">

        <nav class="navbar">
            <a href="index.php">Pocetna</a>
            <a href="usluge.php">Usluge</a>
            <a href="aboutUs.php">O nama </a>
        </nav>

        <div class="icons">
            <?php
                require_once 'database.php';
                             
            if(isset($_SESSION['id'])){
                    $user = $_SESSION['id'];
                    $tip = $_SESSION['tip'];
                    
                if($tip == 'pacijent'){ 
                    echo  '<a href="pacijent.php">Pacijent</a>';
                    echo  '<a href="logout.php">Odjavi se</a>';
                }
                if($tip == 'fizijatar'){
                    echo  '<a href="fizijatar.php">Fizijatar</a>';
                    echo  '<a href="logout.php">Odjavi se</a>';
                }
                if($tip == 'admin'){
                    echo  '<a href="admin.php">Admin</a>';
                    echo  '<a href="logout.php">Odjavi se</a>';
                }
            }
            else{
                echo '<a href="signup.php">Registruj se</a>';
                echo '<a href="login.php">Prijavi se</a>';
            }    
            ?>
        </div>
    </header>