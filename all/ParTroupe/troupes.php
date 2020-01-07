<!DOCTYPE html>
    <html>
	
					
					<?php
					function troupe(){
						$CHOIX = [];
						$ligne = 0;
						$tab = [];
						$nbTroupe = 0;
						if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
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
							echo" <div class ='bloc_bleu' >";	
							echo "<h2>".$tab[$j]."</h2></br>";
							for($i = 0; $i < $ligne ; $i++){
								if($CHOIX[$i][5] == $tab[$j]){
									echo " <p><Horaire> ".$CHOIX[$i][0]." à ".$CHOIX[$i][1]. "</Horaire>, au  <Lieu> ".$CHOIX[$i][3]." à ".$CHOIX[$i][4]."</Lieu> ,<titreSpectacle> ".$CHOIX[$i][2]."</titreSpectacle> </p>";
								}
							}
							echo "</div>";	//bloc_bleu
						}
							
					}
					?>

</html>
