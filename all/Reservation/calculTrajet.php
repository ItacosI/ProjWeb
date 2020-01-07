<?php
	if(($handle = fopen("../CSV/tpsTrajet.csv", "r")) !== FALSE) {
		$premiere = fgetcsv($handle, 1000, ",");
		for($i = 0; $i < count($premiere); $i++) { //on trouve la colone correspondant à la première ville
			if(utf8_encode($premiere[$i]) == $_GET["v1"]) {
				$col = $i;
				break;
			}
		}
		//echo utf8_encode($_GET["v2"]);
		while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //on cherche la ligne correspondant à la seconde ville
			//echo utf8_encode($data[0])."\n";
			if(utf8_encode($data[0]) == $_GET["v2"]){
				$res = $data[$col]; //on récupere les données du trajet
				break;
			}
		}

		if($_GET["h"] > 1020 && $_GET["h"] < 1140){ //si l'horraire de départ est compris entre 17h et 19h
			echo explode('/', $res)[0].'/'.(floor(explode('/', $res)[1]*1.1)+1);
		}else{ //sinon on renvoi le resultat issu du tableau
			echo $res;
		}


	}
?>