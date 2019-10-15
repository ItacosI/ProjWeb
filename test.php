

<!DOCTYPE html>
    <html>
	
	<!-- Affichage Dans l'onglet et choix des caractères-->
      <head>
        <title> Theatres de Bourbon&#8239;; Accueil</title>

		<link rel="stylesheet" href="style.css">
		<meta charset = "utf-8"/>

		
		
      </head>
      
	  
	
	 
	 <!-- Corps de la page-->
 <body>



	<main>
		<div class="decalage" >
		<div class ="bloc_bleu" >
		<?php
			$CHOIX = [];
			$ligne = 0;
			if (($handle = fopen("ResultatsFestival.csv", "r")) !== FALSE) {
				$data = fgetcsv($handle, 1000, ",");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$CHOIX[$ligne] = $data;
					$jour = $CHOIX[0][0];
					echo "<h2>".$CHOIX[$ligne][0]."</h2> </br>";

					
						if($CHOIX[$ligne][0] == $jour){
						echo "<Horaire> ".$CHOIX[$ligne][1]. "</Horaire>, au  <Lieu> ".$CHOIX[$ligne][3]." à ".$CHOIX[$ligne][4]."</Lieu>,  <titreSpectacle> ".$CHOIX[$ligne][2]."</titreSpectacle> par <Troupe> ".$CHOIX[$ligne][5]."</Troupe>";
						}else{
						$jour = $CHOIX[$ligne][0];
						echo "<Horaire> ".$CHOIX[$ligne][1]. "</Horaire>, au  <Lieu> ".$CHOIX[$ligne][3]." à ".$CHOIX[$ligne][4]."</Lieu>,  <titreSpectacle> ".$CHOIX[$ligne][2]."</titreSpectacle> par <Troupe> ".$CHOIX[$ligne][5]."</Troupe>";
						}
					
					
					$ligne++;

				}
				fclose($handle);
			}
			
?>


		</div>
		</div>
</main>



</body>	
</html>
