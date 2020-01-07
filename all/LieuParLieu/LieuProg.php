    <!DOCTYPE html>
	 <html>
			<?php 
			//affiche la programmation d'un spectacle a partir du lieu passé en parametre
			function prog($Lieu){
			$CHOIX = [];
			$ligne = 0;
			if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {				//on ouvre le csv en lecture
				$data = fgetcsv($handle, 10000, ",");										//on place la premiere csv dans une variable data qui est un tableau 
				while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {					//tant que le csv n'est pas vide on le place une case de data 
					$CHOIX[$ligne] = $data;													//on place le tableau data dans la premiere case du tableau choix 
					if ($CHOIX[$ligne][3] == $Lieu){
						echo "<p> <Horaire> ".$CHOIX[$ligne][0]." à ".$CHOIX[$ligne][1]. "</Horaire>, <Troupe> ".$CHOIX[$ligne][5]."</Troupe> presente <titreSpectacle> ".$CHOIX[$ligne][2]."</titreSpectacle> </p>";
						$ligne++;
					}
				}
				fclose($handle);
			 }
			}
			
			
			//Affiche les lieux avec leur information
			function lieu(){
				$CHOIX = [];
				$ligne = 0;
				if (($handle = fopen("../CSV/Lieu.csv", "r")) !== FALSE) {									//on ouvre le csv en lecture
					$data = fgetcsv($handle, 10000, ",");											//on place la premiere csv dans une variable data qui est un tableau 
						while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {					//tant que le csv n'est pas vide on le place une case de data 
								$CHOIX[$ligne] = $data;												//on place le tableau data dans la premiere case du tableau choix 
								echo "<div class='Lieu'>";
								echo "<h2 id ='".$CHOIX[$ligne][2]."'>".$CHOIX[$ligne][0]."</h2>";	//affiche le lieu et la ville 
								echo"<p>".$CHOIX[$ligne][1]."</p>";									//affiche la distance
								echo"<h2>".$CHOIX[$ligne][2]."</h2>";								//affiche le lieu 
								echo"<div>";
								echo"<figure class='lieu' > <img  src=../".$CHOIX[$ligne][4]." alt='".$CHOIX[$ligne][6]."' width=100% height=100%> <figcaption>Photographe&#8239; : ".$CHOIX[$ligne][5]."</figcaption></figure>"; //affiche l'image et ses infomartions
								echo "<p>".$CHOIX[$ligne][3]."</p>";
								echo"</div";
								echo"<div> <h2>".$CHOIX[$ligne][2]." à ". $CHOIX[$ligne][0]."</h2>"; //affiche le lieu et la ville
								echo "<h2> Le Programme</h2> </div>";
								echo prog($CHOIX[$ligne][2]);										//affiche le programme
								echo "</div>";
								
								$ligne++;

					}
					fclose($handle);
				}
				
			}
			
		
		//affiche le menu de la barre de navigation 
		function navBar(){
				$CHOIX = [];
				$ligne = 0;
				if (($handle = fopen("../CSV/Lieu.csv", "r")) !== FALSE) {												//on ouvre le csv en lecture
					$data = fgetcsv($handle, 10000, ",");														//on place la premiere csv dans une variable data qui est un tableau 
					echo "<div id='vignette'>";
						while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {								//tant que le csv n'est pas vide on le place une case de data 
								$CHOIX[$ligne] = $data;														//on place le tableau data dans la premiere case du tableau choix 
								echo "<a href ='#".$CHOIX[$ligne][2]."'>";	//crée le racourci
								echo "<img class='vignette' src=../".$CHOIX[$ligne][4]." alt='".$CHOIX[$ligne][6]."' width=100% height=100% > </a>";	 //affiche l'image correspondante 
								
								$ligne++;

					}
					echo "</div>";
					fclose($handle);
				}
				
			
		}
			
			
		?>
	
</html>
