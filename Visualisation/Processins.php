

	<?php		function AfficheCSV(){
				header('Content-Type:application/json');	
				$CHOIX = [];
				$ligne = 0;
				if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
					$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$CHOIX[$ligne] = $data;
						$ligne++;
					}
					echo json_encode($CHOIX);
					fclose($handle);
				}
			}
			
			
			
			
			
			
		function AffichePlaces(){
				header('Content-Type:application/json');	
				$CHOIX = [];
				$ligne = 0;
				$tab = [];
				if (($handle = fopen("../CSV/ResultatsFestival.csv", "r")) !== FALSE) {
					$data = fgetcsv($handle, 1000, ",");
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$CHOIX[$ligne] = $data;
						$tab[$ligne][0] = $CHOIX[$ligne][2];
						$tab[$ligne][1] = $CHOIX[$ligne][3];
						$tab[$ligne][2] = $CHOIX[$ligne][6];
						$tab[$ligne][3] = $CHOIX[$ligne][7];
						$tab[$ligne][4] = $CHOIX[$ligne][8];
						$tab[$ligne][5] = $CHOIX[$ligne][9];
						$tab[$ligne][6] = $CHOIX[$ligne][10];
						$tab[$ligne][7] = $CHOIX[$ligne][11];
						$ligne++;
					}
					echo json_encode($tab);
					fclose($handle);
				}
			}
			
		AffichePlaces();


	
?>

