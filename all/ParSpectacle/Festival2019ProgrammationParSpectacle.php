 <!DOCTYPE html>
	<html>
	<!-- Affichage Dans l'onglet et choix des caractères-->
      <head>
        <title> Spectacles&#8239;; Théâtres de Bourbon </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../Style/style.css">
		<?php include ("spectacle.php"); ?>
      </head>
	  
	 
	 <!-- Corps de la page-->
      <body>
		<div class="bandeau">
			 <div class="petitPanier">
				<table>
					Billets en vente exclusivement sur les lieux du festival: Monétay, Monteignet, Veauce  du 2 au 6 août dès 11h00 et le 6 août à Moulins de 19h00 à 20h00.Attention! à Moulins le début du spectacle à 20h00. 
				</table>
			 </div><!-- class="petitPanier"-->							
			<h1>Théâtres de Bourbon&#8239;: les spectacles</h1>
		</div ><!--class="bandeau"-->
		
		<div class="menu"><!-- Menu de navigation du site -->
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
				<li><a href="../LieuParLieu/Festival2019ProgrammationParLieu.php">Lieu par Lieu</a></li>
				<li><a href="Festival2019ProgrammationParSpectacle.php">Spectacles</a></li>
				<li><a href="../ParTroupe/Festival2019Troupes.php">Troupes</a> </li>
				<li><a href="../Festival2020Tarifs.php">Tarifs</a> </li>
				<li><a href="../Reservation/reservation.php">Réservation</a></li>
				
			 
			</ul><!--navbar-->


			<!-- Menu de navigation de la page -->
				<div class="riquiqui">
					<ul class="navbar">
						<?php menu();?>
					</ul> <!--navbar-->
				</div><!--riquiqui-->
		
		</div ><!--menu-->
		
	
		<main>
			<div class="decalage">
				<div class="Lieu">
						<p>	
						Dès cette première édition, le festival propose une programmation ambitieuse et riche. Les troupes participantes sont toutes aguerries et professionnelles et elles ont comme nous une approche passionnée du théâtre. 
						Cet événement se veut novateur et ambitieux, puisque l'excellence des spectacles sera accessible à tous, dans une ambiance amicale et chaleureuse.
						</p>
						<h2> Notre programmation...</h2>

						<?php  Spect(); ?> <!--affiche la programmation-->

					 
					<h2> navigation au coeur des spectacles</h2>

					<p>
						Dans la liste indiquant notre programmation un clic sur le titre du spectacle vous orientera directement vers son résumé et ses dates de représentations.
						Réprésentations que vous pourrez alors choisir de mettre dans le panier pour y réserver ensuite des places (dès la réservation ouverte).
						Quand un clic sur le nom de la compagnie vous redirigera vers son site web professionnel.
						Vous pouvez aussi accèder directement au détail d'un spectacle en cliquant simplement sur son affiche miniature.
						Pour revenir ici, il vous suffit de cliquer de nouveau sur l'onglet "spectacles" dans le menu du site.
						Vous pouvez aussi dérouler la description de tous les spectacles dans l'ordre alphabetique de titre via l'asenceur de votre navigateur. 
					</p>
				
				

				</div><!--Lieu-->

				<?php affiche(); ?> <!--Affiche tout les sepectacle avec leur information -->

						<date>programmation définie au dimanche 28 juillet 2019</date>

			</div><!--decalage-->
		</main>


	<footer>
		Spectacle <address>Page conçue par Kevin HUART et Mathilde VERRIEZ CHASTANG</address>
	</footer>
	
</body>
</html>
