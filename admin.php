<?php
    require_once 'navbar.php';
    require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravljanje korisnicima</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="mainA">
        <h2 style="margin-left: 10px;">Zahtevi za registraciju:</h2>
        <?php
            $sql="SELECT * FROM korisnici WHERE tip IN ('pacijent', 'fizijatar') AND dozvola !='odobren'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                ?>               
                <table class="tabela">
                <tr>
                    <th>ID</th>
                    <th>IME</th>
                    <th>PREZIME</th>
                    <th>EMAIL</th>
                    <th>POL</th>
                    <th>DATUM ROĐENJA</th>
                    <th>DRZAVA ROĐENJA</th>
                    <th>MESTO</th>
                    <th>TELEFON</th>
                    <th>JMBG</th>
                    <th>TIP</th>
                    <th>ODOBRI/ODBIJ</th>
                </tr> 
                
                <?php
                
                    while($row=$result->fetch_assoc()){
                        $id=$row['id'];
                        $tip=$row['tip'];
                            ?>
                <tr class="">
                
                    <td>
                    <?php  echo $row["id"]; ?>
                     </td>
                    <td>
                    <?php echo $row["Ime"]; ?>
                    </td>
                    <td>
                    <?php echo $row["Prezime"]; ?>
                    </td>
                    <td>
                    <?php echo $row["Email"]; ?>
                    </td>
                    <td>
                    <?php echo $row["Pol"]; ?>
                    </td>
                    <td>
                    <?php echo $row["datum"]; ?>
                    </td>
                    <td>
                    <?php echo $row["drzava"]; ?>
                    </td>
                    <td>
                    <?php echo $row["mesto"]; ?>
                    </td>
                    <td>
                    <?php echo $row["telefon"]; ?>
                    </td>
                     <td>
                    <?php echo $row["jmbg"]; ?>
                    </td>
                    <td>
                     <?php echo $row["tip"]; ?>
                     </td>
                     <td>
                        <?php 
                        if($tip ='pacijent') {
                            ?>
                         <button class="btnu"><a href="odobri.php?odobripacijent=<?=$id;?>">Odobri</a></button>
                         <?php
                        }
                         elseif($tip='fizijatar'){
                            ?>
                        <button class="btnu"><a href="odobri.php?odobrifizijatar=<?=$id;?>">Odobri</a></button>
                        <?php
                         }
                        ?>
                         <button class="btnd"><a href="odobri.php?odbij=<?=$id;?>">Odbij</a></button>
                     </td>
                  </tr>        
                     <?php
                      
                    }
            }
            ?>
            </table>
    <?php
            ?>
    </div>
</body>
</html>