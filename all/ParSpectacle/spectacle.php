    <!DOCTYPE html>
	 <html> 
		 <!--
			
			//affiche la liste des spectacles et le nombre de spectacle different
			function Spectacle(){
			$CHOIX = [];
			$ligne = 0;
			$tab = [];
			$nbSpectacle = 0;
			if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
				$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$CHOIX[$ligne] = $data;
					$estDedans = false;
					for($i = 0; $i < $nbSpectacle; $i++){
						if($tab[$i] == $data[2])
							$estDedans = true;
					}
					
					if(!$estDedans){
						$tab[$nbSpectacle] = $data[2];
						$nbSpectacle++;
					}		
					
				}
					$ligne++;
				}
				echo "<h3>...".$nbSpectacle." spectacles sélectionnés pour vous par notre directeur artistique.</h3>" ;
				echo "<p>";
					for($i =0; $i < $nbSpectacle ; $i++){
					echo "<li><titreSpectacle> ".$tab[$i]."</titreSpectacle> </li>";
				}
				echo"</p>";
				fclose($handle);
			}
			-->
			
			<?php
			//affiche la liste des spectacles
			function Spect(){
				$CHOIX = [];
				$ligne = 0;
				$tabSpec = [];
				$tabAut = [];
				if (($handle = fopen("../CSV/descriptionSpectacle.csv", "r")) !== FALSE) {
					$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$CHOIX[$ligne] = $data;
						$tabSpec[$ligne] = $CHOIX[$ligne][0];	//on stock les titres dans un tableau
						$tabAut[$ligne] = $CHOIX[$ligne][1];	//on stock les auteurs dans un tableau 
						$ligne++;
					}
					echo"<h3>...".$ligne." spectacles sélectionnés pour vous par notre directeur artistique.</h3>" ; //on affiche le nombre de spectacle
					echo "<p>";
					
					for ($i = 0; $i < $ligne; $i ++){
						echo "<li><titreSpectacle> ".$tabSpec[$i]." </titreSpectacle>, d'apres <auteur> " .$tabAut[$i]."</auteur> </li>";	//on affiche les titres avec les auteurs correspondant
					}	
					
					echo "</p>";
					fclose($handle);
				
			}
		}

			
			
			
			//affiche les dates d'un spectacle a partir de son titre donné en parametre
			function prog($titre){
			$CHOIX = [];
				$ligne = 0;
				if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
					$data = fgetcsv($handle, 1000, ",");
						while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
							$CHOIX[$ligne] = $data;
							if ($CHOIX[$ligne][2] == $titre ){
								echo "<p> <Horaire> ".$CHOIX[$ligne][1]." le ".$CHOIX[$ligne][0]. "</Horaire>  au <lieu>".$CHOIX[$ligne][3]." à ".$CHOIX[$ligne][4]."</lieu> </p>";
								$ligne++;
							}
						}
					fclose($handle);
				}
			}
			
			
			//affiche les informations d'un spectacle( titre, auteur,description,photo..)
			function affiche(){				
				$CHOIX = [];
				$ligne = 0;
				if (($handle = fopen("../CSV/descriptionSpectacle.csv", "r")) !== FALSE) {
					$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$CHOIX[$ligne] = $data;
						echo "<div class='Spectacle'>";
						echo "<h2> <titreSpectacle id = ".$CHOIX[$ligne][6]."> ".$CHOIX[$ligne][0]. "</titreSpectacle>, d'apres <Auteur>".$CHOIX[$ligne][1]."</Auteur> par <Troupe>".$CHOIX[$ligne][2]."</Troupe> </h2>";
						echo "<p> <figure> <img src = ../".$CHOIX[$ligne][4] ." alt = L'affiche du spectacle :".$CHOIX[$ligne][0]." width=100% height=100% > </figure> <figurecaption> Photographe&#8239 : ".$CHOIX[$ligne][5]."</figurecaption></p>";
						echo "<p>".$CHOIX[$ligne][3]."</p>";
						echo"<h2><TitreSpectacle>".$CHOIX[$ligne][0]."</TitreSpectacle></h2>";
						echo prog($CHOIX[$ligne][0]);
						echo "</div>";
						$ligne++;
					}
					fclose($handle);
				}
				
			}
			
			
			//affiche le menu de la page avec les raccourcis pour les spectacle 
			function menu(){
				$CHOIX = [];
				$ligne = 0;
				if (($handle = fopen("../CSV/descriptionSpectacle.csv", "r")) !== FALSE) {
					$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$CHOIX[$ligne] = $data;
						echo "<a href =Festival2019ProgrammationParSpectacle.php#".$CHOIX[$ligne][6] ."><li><titreSpectacle>".$CHOIX[$ligne][0]."</titreSpectacle></li> </a>";
						$ligne++;
					}
					fclose($handle);
				}
				
			}
		?>
		
</html>
