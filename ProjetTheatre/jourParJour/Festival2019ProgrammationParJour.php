<!DOCTYPE html>
 <html>

	
	<!-- Affichage Dans l'onglet et choix des caractères-->
      <head>
        <title> Jour après jour&#8239;; Théâtres de Bourbon  </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/style.css">
		<?php include("jourParJour.php"); ?>
      </head>
	  
	
	 
	 <!-- Corps de la page-->
      <body>
		  
		<div class="bandeau">
			 <div class="petitPanier">
				 <table>Billets en vente exclusivement sur les lieux du festival: Monétay, Monteignet, Veauce  du 2 au 6 août dès 11h00 et le 6 août à Moulins de 19h00 à 20h00.Attention! à Moulins le début du spectacle à 20h00. </table>
			 </div><!-- class="petitPanier"-->							
			<h1>Théâtres de Bourbon : jour après jour</h1>
		</div><!--bandeau-->
		
		<div class="menu">
			<ul class="navbar">
				Le site&#8239;:
				<div id="vignette">						
						<a href="../index.php">
							<img class="vignette"
								src="../images/logo.jpg"
								alt="[logo de l'association vers l'accueil du site]"
								width=30%
								height=30%
								decoding=low
							>
						</a>
				</div><!-- div vignette-->
				
				<li><a href="../presentation.php">Qui sommes nous?</a></li>
				<li><a href="Festival2019ProgrammationParJour.php">Jour par Jour</a></li>
				<li><a href="../LieuParLieu/Festival2019ProgrammationParLieu.php">Lieu par Lieu</a></li>
				<li><a href="../ParSpectacle/Festival2019ProgrammationParSpectacle.php">Spectacles</a></li>
				<li><a href="../ParTroupe/Festival2019Troupes.php">Troupes</a> </li>
				<li><a href="../Festival2020Tarifs.php">Tarifs</a> </li>

				
	  
			</ul><!--navbar-->
		</div><!--menu-->

	
		<main>
			<div class="decalage" >											
					<div>
					<?php affiche(); //affiche la programmation jour par jour ?>
			</div><!--decalage-->
		</main>


	</body>	
</html>

