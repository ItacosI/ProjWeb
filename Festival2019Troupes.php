 <!DOCTYPE html>
    <html>
	
	<!-- Affichage Dans l'onglet et choix des caractères-->
      <head>
        <title> Theatres de Bourbon&#8239;; Troupes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style.css">
      </head>
	  
	
	 
	 <!-- Corps de la page-->
      <body>
		<div class="bandeau">
			 <div class="petitPanier"><table>Billets en vente exclusivement sur les lieux du festival: Monétay, Monteignet, Veauce  du 2 au 6 août dès 11h00 et le 6 août à Moulins de 19h00 à 20h00.
									Attention! à Moulins le début du spectacle à 20h00. </table></div><!-- class="petitPanier"-->							
										<h1> Théâtres de Bourbon: Les troupes</h1>
		</div ><!--class="bandeau"-->
		
		<div class="menu">
			<!-- Menu de navigation du site -->
			
	
		<ul class="navbar">
			Le site&#8239;:
			<div id="vignette">						
					<a href="index.php">
						<img class="vignette"
							src="images/logo.jpg"
							alt="[logo de l'association vers l'accueil du site]"
							width=30%
							height=30%
							decoding=low
						>
					</a>
			</div><!-- div vignette-->
			<li><a href="presentation.php">Qui sommes nous?</a></li>
			<li><a href="Festival2019ProgrammationParJour.php">Jour par Jour</a></li>
			<li><a href="Festival2019ProgrammationParLieu.php">Lieu par Lieu</a></li>
			<li><a href="Festival2019ProgrammationParSpectacle.php">Spectacles</a></li>
			<li><a href="Festival2019Troupes.php">Troupes</a> </li>
			<li><a href="Festival2020Tarifs.php">Tarifs</a> </li>
			<li><a href="reservation.php">Reservation</a> </li>
			
		</ul>



	

	
		</div >
			
		

		<main>
		<div class="decalage" >
		<div class ="bloc_bleu" >
		
		<?php
			$CHOIX = [];
			$ligne = 0;
			$tab = [];
			$nbTroupe = 0;
			if (($handle = fopen("ResultatsFestival.csv", "r")) !== FALSE) {
				$data = fgetcsv($handle, 1000, ",");
				$troupe = " ";
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$CHOIX[$ligne] = $data;
					$estDedans = false;
					for($i = 0; $i < $nbTroupe; $i++){
						if($tab[$i] == $data[5])
							$estDedans = true;
					}
					
					if(!$estDedans){
						$tab[$nbTroupe] = $data[5];
						$nbTroupe++;
					}		
					
					$ligne++;

				}
				fclose($handle);
			}
			for($j = 0; $j < $nbTroupe; $j++){
				echo "<h2>".$tab[$j]."</h2></br>";
				for($i = 0; $i < $ligne ; $i++){
					if($CHOIX[$i][5] == $tab[$j]){
						echo " <p><Horaire> ".$CHOIX[$i][0]." à ".$CHOIX[$i][1]. "</Horaire>, au  <Lieu> ".$CHOIX[$i][3]." à ".$CHOIX[$i][4]."</Lieu> ,<titreSpectacle> ".$CHOIX[$i][2]."</titreSpectacle> </p>";
					}
				}
			}
				
			
		?>


		</div>
		</div>
		</main>
	
	<footer>
		Les troupes <address>Page conçue par Kevin HUART et Mathilde VERRIEZ CHASTANG</address>
	</footer>
	
</body>	
</html>

