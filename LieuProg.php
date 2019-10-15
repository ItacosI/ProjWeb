
			<?php 
			function prog($Lieu,$village){
			$CHOIX = [];
			$ligne = 0;
			if (($handle = fopen("ResultatsFestival.csv", "r")) !== FALSE) {
				$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$CHOIX[$ligne] = $data;
					if ($CHOIX[$ligne][3] == $Lieu && $CHOIX[$ligne][4] == $village){
					echo "<p> <Horaire> ".$CHOIX[$ligne][0]." à ".$CHOIX[$ligne][1]. "</Horaire>, <Troupe> ".$CHOIX[$ligne][5]."</Troupe> presente <titreSpectacle> ".$CHOIX[$ligne][2]."</titreSpectacle> </p>";
					
					$ligne++;
				}

				}
				fclose($handle);
			}
			}
			
		?>
		
