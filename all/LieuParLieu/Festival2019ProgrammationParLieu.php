    <!DOCTYPE html>
	 <html>
	
	<!-- Affichage Dans l'onglet et choix des caractères-->
      <head>
        <title> Lieux&#8239;; Théâtres de Bourbon </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/style.css">
		<?php include("LieuProg.php"); ?>
      </head>
 
 
	 <!-- Corps de la page-->
      <body>
		<div class="bandeau">
			<h1> Théâtres de Bourbon&#8239;: Dans chaque lieu</h1>
		</div><!--bandeau-->
		
		
		<div class="petitPanier">
			<table>Billets en vente exclusivement sur les lieux du festival: Monétay, Monteignet, Veauce  du 2 au 6 août dès 11h00 et le 6 août à Moulins de 19h00 à 20h00.Attention! à Moulins le début du spectacle à 20h00. </table>
		</div><!-- class="petitPanier"-->							
		
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
				<li><a href="../jourParJour/Festival2019ProgrammationParJour.php">Jour par Jour</a></li>
				<li><a href="Festival2019ProgrammationParLieu.php">Lieu par Lieu</a></li>
				<li><a href="../ParSpectacle/Festival2019ProgrammationParSpectacle.php">Spectacles</a></li>
				<li><a href="../ParTroupe/Festival2019Troupes.php">Troupes</a> </li>
				<li><a href="../Festival2020Tarifs.php">Tarifs</a> </li>
				<li><a href="../Reservation/reservation.php">Réservation</a></li>
				
			</ul><!--navbar-->


			<ul class="navbar">La page&#8239;:</ul>			
				<?php navBar();?>	<!--affiche le menu de navigation-->
		
		</div ><!--menu-->
		
	<main>
		<section>
			<div class= "decalage">
				<h2> Quatres demeures de l'Allier, un musée et une église vous ouvrent leurs grilles pour assister aux représentations théâtrales. </h2>
					<p> Choissisez un lieu en cliquant sur son bouton (dans le menu de la page) pour voir la programmation qu'il accueille puis selectionnez les spectacles qui s'y jouent et vous intéresse. </p>
					<figure>
						<img  	
							src="../images/kje.jpg" alt=" Infographie Pour Situer les châteaux sur la carte du département "
							width=100%
							height=100%
							id="localisation"
						>
						<figcaption>Photocomposition&#8239;:Edmée Deusy</figcaption>
					</figure>
				﻿
				<?php 
				lieu();	//affiche chaque lieu avec ses informations 
				?>


				<date>programmation telle que définie au dimanche 28 juillet 2019 </date>

			</div><!--decalage-->
		</section>
	</main>
	
	
	<footer>
		Lieu par Lieu <address> Page conçue par Kevin HUART et Mathilde VERRIEZ CHASTANG</address>
	</footer>

</body>
</html>
