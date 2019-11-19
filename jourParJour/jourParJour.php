<!DOCTYPE html>
    <html>
	
					

	<?php
	//affiche un auteur correspondant a un titre 
	function auteur($TITRE){
			$CHOIX = [];
			$ligne = 0;
			if (($handle = fopen("../CSV/descriptionSpectacle.csv", "r")) !== FALSE) {		//on ouvre le csv en lecture
				$data = fgetcsv($handle, 1000, ",");
				$jour = " ";
				while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
					$CHOIX[$ligne] = $data;
					
					if($CHOIX[$ligne][0] == $TITRE){							
						return $CHOIX[$ligne][1];
					}
					$ligne++;
				}
				fclose($handle);
			}
		}
	
	
	
		function affiche(){
			$CHOIX = [];
			$ligne = 0;
			if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {		//on ouvre le csv en lecture
				$data = fgetcsv($handle, 10000, ",");
				$jour = " ";
				while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
					$CHOIX[$ligne] = $data;
					
					if($CHOIX[$ligne][0] !== $jour){
						echo "</div>";
						echo" <div class ='bloc_bleu' >";							
						$jour = $CHOIX[$ligne][0];
						echo "<h2>".$jour."</h2> ";
					}
					echo " <p><Horaire> ".$CHOIX[$ligne][1]. "</Horaire>, au  <Lieu> ".$CHOIX[$ligne][3]." à ".$CHOIX[$ligne][4]."</Lieu>,  <titreSpectacle> ".$CHOIX[$ligne][2]."</titreSpectacle>, de <Auteur>". auteur($CHOIX[$ligne][2])."</Auteur>,  par <Troupe> ".$CHOIX[$ligne][5]."</Troupe> </p>";
					
					$ligne++;
				}
				fclose($handle);
			}
		}

			
		?>

</html>
