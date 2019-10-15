


<!DOCTYPE html>
    <html>
	
	<!-- Affichage Dans l'onglet et choix des caractères-->
      <head>
        <title> Theatres de Bourbon&#8239;; Accueil</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="style.css">
		
		
      </head>
      
	  
	
	 
	 <!-- Corps de la page-->
 <body>

		<main>
			<div class="decalage" >
			<div class ="bloc_bleu" >

			
			<?php
			$fichier=fopen("ResultatsFestival.csv", "r");
			$i=1 ;//Compteur de ligne
			if(!feof($fichier))
				fgets($fichier,1024);
			while(!feof($fichier)){
				$ligne= fgets($fichier,1024);
			$i ++;
			echo  $ligne . " </br>";
				$i ++;
			}
		
			fclose($fichier) ; 
			?>
		</div>
		</div>
		
		<div class="decalage" >
		<div class ="bloc_bleu" >

			
			<?php
			$fichier=fopen("ResultatsFestival.csv", "r");
			 $tab = explode ( ";" , $fichier );
			$i=1 ;//Compteur de ligne
			if(!feof($fichier))
				fgets($fichier,1024);
				$champs = count($tab);
			while($tab=fgetcsv($fichier,1024,';')){
				$ligne= fgets($fichier,1024);
				for($i=0; $i<$champs-6; $i ++)
				{
				echo $tab[$i] . "</br>";
					}
			}
			fclose($fichier) ; 
			
			?>
		</div>
		</div>
		
		</main>


</body>	
</html>
