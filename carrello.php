<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gusci Carrello</title>
    <link rel="icon" href="img/icon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <link rel="stylesheet" href="css/classi.css">
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <style>
        .banner_carrello
        {
            border: solid 1px;
            display:flex;
            margin-top:10px;
            border-radius: 15px;
            padding: 10px;
            position: relative;
        }
    

    </style>

<header class="nav">
<?php 
    
    if(isset($_SESSION['acess']))
    {
        echo "<a id='hideCar' href='carrello.php'> ";
        echo "<img src='img/carrello.png' id='carrello' class='carrello' style='display: block;'> "."</a> ";
        echo "<div style='position:absolute;top: 20px;right:30px;'> ";
        echo "<h2 id='hide' style='font-size: 15px; position: relative; right: 40%;  width: 150px;'>".'Benvenuto,'."<br>". $_SESSION['nome']."  ".$_SESSION['cognome']."</h2> ";
        echo "</div>";
        echo "<div style='display: block; width: max-content;   margin-left: auto;  margin-right: auto;'> ";
        echo "<ul class='menu' style='display: table-cell;'> ";
        echo "<li><a href='index.php' style='text-decoration:none;'><h2 class='voci'>pag iniziale</h2></a></li> ";
        echo "<li><a href='sconti.php' style='text-decoration:none;'><h2 class='voci'>sconti</h2></a></li> ";
        echo "<li><a href='info.php' style='text-decoration:none;' ><h2 class='voci'>info</h2></a> </li> ";
        echo "<li><a href='session_destroy.php' id='SesD' style='text-decoration:none;'><h2 class='voci_hide' style='display: block;' id='hide2'>logout</h2></a></li>"."</ul> ";
        echo <<<'EOT'
        </div>
        <h1 class="titNav" id="titNav" >
            GUSCI
        </h1>

        <button onclick="dropDownL()" class="DropL" id="DropL">  
            <span class="tre"></span>
            <span class="tre"></span>
            <span class="tre" style="margin-bottom: 0;"></span>
        </button>
        
        
        <div id="cont_dropL" class="cont_dropL" style="top:-15px;">
            <ul class="lista_cont_dropL">
EOT;
                echo '<li class="voci_cont_dropL" style="height: fit-content;">Benvevenuto<br>'. $_SESSION['nome'].'  '.$_SESSION['cognome'].'</li>';
echo <<<'EOT'
                <li class="voci_cont_dropL"><a href="index.php" class="text_voci_cont_dropL">Pag iniziale</a></li>
                <li class="voci_cont_dropL"><a href="sconti.php"  class="text_voci_cont_dropL">Sconti</a></li>
                <li class="voci_cont_dropL"><a href="info.php"  class="text_voci_cont_dropL">Info</a></li>
                <li class="voci_cont_dropL"><a href="carrello.php"  class="text_voci_cont_dropL">Carrello</a></li>
                <li class="voci_cont_dropL" style="border: none;"><a href="session_destroy.php" class="text_voci_cont_dropL">Logout</a></li>
            </ul>
        </div>
       
EOT;
                                
    }
    else
    {
        header("location: index.php");  
    }

    
  

?>
       
        
        <a href="index.php">
            <img src="img/logo_sito.png" alt="" class="img_logo">
        </a>
        
      
        
        <button onclick="dropDownL_close()" class="DropL" style="display: none;" id="DropL_close">  
            <div style="width: 30px; height: 30px; position: relative; top: 10px;">
                <span style="transform: rotate(-45deg);height: 6px; width: 30px; background-color: white;display: block;"></span>
                <span style="transform: rotate(45deg);position: relative;height: 6px; width: 30px; background-color: white;display: block;top: -5px;"></span>
            </div>
        </button>

       
    </header>

    <div id="container_cart">

        <h1 style="text-align: center;
                   margin-bottom: 18px;">CARRELLO</h1>
                   
        <div style="width: 80%; height: 479px; border-top: solid 2px black; border-bottom: solid 2px black; position: relative; overflow: auto; margin: auto;">
<?php
            $conn=mysqli_connect("localhost"," gusci","","my_gusci");


            if(isset($_GET['camb_quant_su']))
            {
                $quantita=mysqli_query($conn,"select * from carrello where idart=".addslashes($_GET['camb_quant_su'])." and iduser=".addslashes($_SESSION['iduser']).";");
                $quantita=mysqli_fetch_assoc($quantita);
                if($quantita['quantita']<10)
                {
                    $i=$quantita['quantita']+1;
                    mysqli_query($conn,"update carrello set quantita=$i where idart=".addslashes($_GET['camb_quant_su'])." and iduser=".addslashes($_SESSION['iduser']).";");  
                }
            }

            if(isset($_GET['camb_quant_giu']))
            {
                $quantita=mysqli_query($conn,"select * from carrello where idart=".addslashes($_GET['camb_quant_giu'])." and iduser=".addslashes($_SESSION['iduser']).";");
                $quantita=mysqli_fetch_assoc($quantita);
                if($quantita['quantita']!=1)
                {
                    $i=$quantita['quantita']-1;
                    mysqli_query($conn,"update carrello set quantita=$i where idart=".addslashes($_GET['camb_quant_giu'])." and iduser=".addslashes($_SESSION['iduser']).";");  
                }
                
            }

            if(isset($_GET['cart_elimina']))
            {   
                mysqli_query($conn,"delete from carrello where idart=".addslashes($_GET['cart_elimina'])." and iduser=".addslashes($_SESSION['iduser']).";");
            }
               

            $articoli_sel=mysqli_query($conn,"select * from carrello where iduser=".addslashes($_SESSION['iduser']).";");
            $flag=false;
            foreach($articoli_sel as $articolo_sel)
            {    
                $articolo=mysqli_query($conn,"select * from articoli where idart=".addslashes($articolo_sel['idart']).";");
                $articolo=mysqli_fetch_assoc( $articolo);
                if(strlen($articolo['idart'])<=0)
                    mysqli_query($conn,"delete from carrello where idart=".addslashes($articolo_sel['idart'])." and iduser=".addslashes($_SESSION['iduser']).";");
                else
                {
                    echo '<div class="banner_carrello">';
                    echo '<img src="data:image;base64,'.$articolo['img'].'"  style="height: 130px;">';
                    echo '<div class="resp_cart">';
                    echo '<h1 class="nome_prod">';
                    echo $articolo['titolo'].'</h1>';
                    if($articolo['sconto']>0)
                        $articolo['prezzo']=floor($articolo['prezzo']-(($articolo['prezzo']*$articolo['sconto'])/100)); 
                    echo '<h2 class="prezzo_prod">
                            <span id="toggle_prez_car">Prezzo:</span>'.$articolo['prezzo'].' &#x20ac </h2>';
                    echo '</div>';
                    echo "<a href='carrello.php?cart_elimina=".$articolo_sel['idart']."' >";
                    echo '<img src="img/cancella.png" alt="" style="position: absolute;right: 10px; height:40px; border-radius: 10px;">'. "</a>";
                    echo '<h3 style="position: absolute; right: 70px; bottom: 30px; width: fit-content;">Quantità:</h3>';
                    echo '<h3 style="position: absolute; bottom: 30px; right: 50px;">'.$articolo_sel['quantita'].'</h3> ';
                    echo "<a href='carrello.php?camb_quant_su=".$articolo_sel['idart']."' >";
                    echo '<img src="img/freccia_su.png" alt="" style="position: absolute;right: 10px; bottom: 45px ; height:30px; border-radius: 10px;">'. "</a>";
                    echo "<a href='carrello.php?camb_quant_giu=".$articolo_sel['idart']."' >";
                    echo '<img src="img/freccia_giu.png" alt="" style="position: absolute;right: 10px; bottom: 10px ; height:30px; border-radius: 10px;">'. "</a>";
                    echo '</div>';
                    $prezzo_tot=$prezzo_tot+($articolo['prezzo']*$articolo_sel['quantita']);
                }

                $flag=true;
            }
            if(strlen($prezzo_tot)<=0)
                $prezzo_tot=0;

            mysqli_close($conn);
?> 

        </div>
        <div class="bottom_cart">
            <h1 id="prezzo_tot">Prezzo totale: <?php echo $prezzo_tot ?> &#x20ac</h1>
<?php    
    if($flag)
    {
        echo '<a class="but_paga" href="paga.php"><h2 class="bottoni" style="text-align: center;">Paga</h2></a>';    

    }
    else
        echo '<button class="but_paga" style="background-color: white;border: none;"><h2 class="bottoni" style="text-align: center;">Paga</h2></button>';
    
?>      
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/libreria.js"></script>
    <script type="text/javascript" src="js/codice.js"></script>

</body>
</html>