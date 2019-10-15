<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src ='affiche_table.js'></script>

<table>
	<tr>
		<td>
			<table> <h3>20 Février 2019</h3>
				<tr>
					<td>
						<input type="checkbox" id="choix1" value="La Pièce du siècle/20.02.2019/13h30">La pièce du siècle, Machin Truc - à 13h30</input>
					</td>
					<td>
						<input type="checkbox" id="choix1" value="La Pièce du siècle/20.02.2019/13h30">La pièce du siècle, Machin Truc - à 13h30</input>
					</td>
					<td>
						<input type="checkbox" id="choix1" value="La Pièce du siècle/20.02.2019/13h30">La pièce du siècle, Machin Truc - à 13h30</input>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" id="choix1" value="La Pièce du siècle/20.02.2019/13h30">La pièce du siècle, Machin Truc - à 13h30</input>
					</td>
					<td>
						<input type="checkbox" id="choix1" value="La Pièce du siècle/20.02.2019/13h30">La pièce du siècle, Machin Truc - à 13h30</input>
					</td>
					<td>
						<input type="checkbox" id="choix1" value="La Pièce du siècle/20.02.2019/13h30">La pièce du siècle, Machin Truc - à 13h30</input>
					</td>
				</tr>

			</table>
		</td>
	</tr>
</table>



<?php
	$CHOIX = [];
	$ligne = 0;
	if (($handle = fopen("ResultatsFestival.csv", "r")) !== FALSE) {
	    $data = fgetcsv($handle, 1000, ",");
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	    	$CHOIX[$ligne] = $data;
	    	$ligne++;
	    }
	    fclose($handle);
	}
	$jsc = json_encode($CHOIX);

	echo "<p id='mod'></p>";	
	echo "<script>appel($jsc)</script>";
	echo "<script>chercheEnsembleDate($jsc)</script>";
		echo "<table>\n<tr>\n<td>";

	$dateCourante="";
	$choixCourant="";
	$nbDate = 0;
	for ($i = 0; $i < $ligne; $i++) {
		$cc = $CHOIX[$i];
		if($cc[0] !== $dateCourante){ //Nouvelle table
			$nbDate++; //update nb date
			if($nbDate>0)
				echo "</table>";
			echo "<table>"; //CONTINUER ICI <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		}
	}
?>



<script>var numb= <?php echo 25; ?>;</script>

<script src="checkbox.js"> </script>



