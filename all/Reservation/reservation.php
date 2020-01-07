<!DOCTYPE html>
 <html>

    
    <!-- Affichage Dans l'onglet et choix des caractères-->
    <head>
        <title> Théâtres de Bourbon : Planning </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src ='panier.js'></script>
        <script src ='affiche_table.js'></script>
        <link rel="stylesheet" href="../Style/style.css">
        <link rel="stylesheet" href="../Style/style2.css">
    </head>
      
    
    
     <!-- Corps de la page-->
    <body>
          

    
    <div class="bandeau">
                                         
                                        <h1>Théâtres de Bourbon : jour après jour</h1>
    </div><!--bandeau-->
        
        
        
    <div class="menu">
            
    
        <ul class="navbar">
            Le site&#8239;:
            <div id="vignette">                        
                    <a href="../index.php">
                        <img class="vignette"
                            src="../images/logo.jpg"
                            alt="[logo de l'association vers l'accueil du site]"
                            width=30%
                            height=30%
                            decoding=low
                        >
                    </a>
            </div><!-- div vignette-->
            <li><a href="../presentation.php">Qui sommes nous?</a></li>
            <li><a href="../jourParJour/Festival2019ProgrammationParJour.php">Jour par Jour</a></li>
            <li><a href="../LieuParLieu/Festival2019ProgrammationParLieu.php">Lieu par Lieu</a></li>
            <li><a href="../ParSpectacle/Festival2019ProgrammationParSpectacle.php">Spectacles</a></li>
            <li><a href="../ParTroupe/Festival2019Troupes.php">Troupes</a> </li>
            <li><a href="../Festival2020Tarifs.php">Tarifs</a> </li>
            <li><a href="reservation.php">Réservation</a> </li>
            
 
        </ul>
    </div>
    <main>
    	<div class='decalage'>
    		<div class="bloc_bleu"> <h2> Choisissez une ou plusieurs dates de spectacles </h2> </div>
    		<div id='mod'>
    
			<?php
		        $CHOIX = [];
		        $ligne = 0;
		        if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
		            $data = fgetcsv($handle, 1000, ",");
		            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		                $CHOIX[$ligne] = $data;
		                $ligne++;
		            }
		            fclose($handle);
		        }
		        $jsc = json_encode($CHOIX);
		        echo "\n";
		        echo "<script>appel($jsc)</script>\n";
		    ?>
			</div>
		</div>
		</br>
		<div class='decalage'>
			<div id='selectionPlace'>

			</div>


		</div>

    </main>

    <footer>
        Festival Théâtres de Bourbon  <address>Page conçue par Kevin HUART et Mathilde VERRIEZ CHASTANG</address>
    </footer>

</body>    
</html>


