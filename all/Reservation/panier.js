var panier = [];
var placesPrises = [[-1, 0, 0, 0]]; // De la forme [ [id,plein tarif, tarif reduit, gratuit], ... ]

function clickOnChoisir(id){	
	let found = swapPanier(id);
	//console.log(panier);
	dessineSelectionPlace();
	if(!found)
		initPrixParPlace(id);
	majPrixParSpectacle(panier);
	return;
}

function checkPossible(id1, id2){
	//on regarde si les spectacles sont à des jours différents
	if(csvjson[id1][0] != csvjson[id2][0])
		return true;
	//sinon on check la possibilite
	//on tranforme l'horraire de début du premier spectacle
	let debut1 = csvjson[id1][1].split('h')[0] * 60 + csvjson[id1][1].split('h')[1] * 1;
	//ainsi que l'horraire de début du second spectacle
	let debut2 = csvjson[id2][1].split('h')[0] * 60 + csvjson[id2][1].split('h')[1] * 1;
	let depart, debut;
	if(debut1 < debut2){ //on détermine l'ordre chronologique des spectacles
		depart = debut1 + 120;
		debut = debut2;
	} else {
		depart = debut2 + 120;
		debut = debut1;
	}

	//On regarde si ils se situent dans la meme ville, si oui on regarde si le premier ne déborde pas sur l'autre
	if(csvjson[id1][4] == csvjson[id2][4])
		return (depart <= debut);

	let res = false;
	$.ajax({
		url : 'calculTrajet.php',
		async : false,
		type : 'GET',
		data : 'v1=' + unescape(encodeURIComponent(csvjson[id1][4].split(' ')[0])) + '&v2=' + unescape(encodeURIComponent(csvjson[id2][4].split(' ')[0])) + '&h=' + depart,
		dataType : 'text',
		success : function(resultat){
			let tpsTrajet = resultat.split('/')[1]*1;
			if(depart+tpsTrajet <= debut)	//On peut arriver à destination avant ou en meme temps que le début du spectacle
				res = true;
			else
				res = false;
			//console.log("depart = " + depart + " | tpsTrajet = " + tpsTrajet + " | debut = " + debut + " | res = " + (depart+tpsTrajet <= debut));
	}});
	//console.log(res);
	return res;
}

function ajoutConflit(idc){
	let curLine = [idc];
	for(let i = 0; i<panier.length; i++){
		if(!checkPossible(idc, panier[i][0])){
			curLine.push(panier[i][0]); //ajout du conflit sur la ligne courante
			panier[i].push(idc); //ajout de l'id courant sur la ligne de l'id conflictuelle
		}

	}
	panier.push(curLine);
}

function retireConflit(idc){
	for (var i = 0; i < panier.length; i++) {	//iteration sur l'ensemble du panier
		let found = false;
		for (var j = 1; j < panier[i].length; j++) {	//itération sur la ligne complète à l'exeption de la première case
			if(found){
				panier[i][j-1] = panier[i][j];
			}else{
				if(panier[i][j] == idc){
					found = true;
				}	
			}
		}
		if(found){
			panier[i].pop();
		}
	}
}

function swapPanier(idJson){					//permet le switch a chaque clique
	let found = false;
	for (let i = 0; i < panier.length; i++) {
		if(found){
			panier[i-1] = panier[i];
		}else{
			if(panier[i][0] == idJson){
				found = true;
			}
		}
	}
	if(found){
		retirePlace(idJson);
		panier.pop();
		retireConflit(idJson);
	} else {
		ajoutPlace(idJson);
		ajoutConflit(idJson);
	}
	return found;
}

function retirePlace(id){		//retire la ligne de place prise correspondant à l'id
	let found = false;
	for (var i = 0; i < placesPrises.length; i++) {
		if(found){
			placesPrises[i-1] = placesPrises[i];
		}else{
			if(placesPrises[i][0] == id){
				//On retire toutes les places du spectacle que l'on souhaite retirer au total de places
				placesPrises[0][1] -= placesPrises[i][1];
				placesPrises[0][2] -= placesPrises[i][2];
				placesPrises[0][3] -= placesPrises[i][3];
				found = true;
			}
		}
	}
	placesPrises.pop();
}

function ajoutPlace(id){		//ajoute une ligne de place prise correspondant à l'id
	placesPrises.push([id, 0, 0, 0]);
}

function initPrixParPlace(id){
	affichePrixParPlace(id, 1, 0);
	affichePrixParPlace(id, 2, 0);
	affichePrixParPlace(id, 3, 0);
	affichePrixParSpectacle([id, 0, 0, 0]);
}

function trouvePlace(id){
	for (var i = 0; i < placesPrises.length; i++) {
		if(placesPrises[i][0] == id){
			return placesPrises[i];
		}
	}
}

function majPrixParSpectacle(tab){
	//console.log(tab);
	for (var i = 0; i < tab.length; i++) {
		let spec = trouvePlace(tab[i][0]);
		affichePrixParSpectacle(spec);	//pour reinitialiser le prix du spectacle
		affichePrixParPlace(spec[0], 1, spec[1]);
		affichePrixParPlace(spec[0], 2, spec[2]);
		affichePrixParPlace(spec[0], 3, spec[3]);
	}
}

function affichePrixParSpectacle(tab){
	document.getElementById("ts"+tab[0]).innerHTML = " <div class='tarif'> Total : " + (tab[1]*15 + tab[2]*10) + "€ pour " + (tab[1]*1+tab[2]*1+tab[3]*1) + " place(s)</div>";
}

function affichePrixParPlace(id, type, nb){
	affichePrixTotal();
	if(type == 1)
		document.getElementById(id+"v"+type).innerHTML = nb + " place(s) = " + 15*nb + "€";
	else if(type == 2)
		document.getElementById(id+"v"+type).innerHTML = nb + " place(s) = " + 10*nb + "€";
	else
		document.getElementById(id+"v"+type).innerHTML = nb + " place(s) = 0€";
}

function affichePrixTotal(){
	
	let prix;
	let nbPlacesOfferte = Math.floor((placesPrises[0][1]*1 + placesPrises[0][2]*1)/6);

	//cas ou offerte == 0
	if(nbPlacesOfferte == 0){
		prix = placesPrises[0][1]*15 + placesPrises[0][2]*10;
	}

	//cas ou offerte > 0 et reduit == 0
	else if(placesPrises[0][2]*1 == 0){
		prix = ( placesPrises[0][1]*1 - nbPlacesOfferte ) *15;
	}

	//cas ou offerte <= reduit
	else if(nbPlacesOfferte <= placesPrises[0][2]){
		prix = placesPrises[0][1]*15 + ( placesPrises[0][2]*1 - nbPlacesOfferte ) *10;
	}

	//cas ou offerte > reduit et reduit > 0, seul autre cas
	else {
		prix = ( placesPrises[0][1]*1 - ( nbPlacesOfferte - placesPrises[0][2]*1 ) ) * 15;
	}


	let res = "<div class='bloc_bleu'> <h2>Prix total : " + prix + "€</br>";
	res += "Nombre de place(s) : " + ( placesPrises[0][1]*1 + placesPrises[0][2]*1 + placesPrises[0][3]*1 ) + "</h2>";
	res += "<form action='validation.php' method='post' target='_parent'>\n";
	res += "<input type='hidden' name='prix' value='"+prix+"'>\n";
	res += "<input type='hidden' name='place' value='"+JSON.stringify(placesPrises)+"'>\n";
	res += "<input type='hidden' name='valid' value=0>\n";
	res += "<input type='submit' value='Submit'>\n";
	res += "</form>\n</div>";


	// console.log(res);
	document.getElementById("total").innerHTML = res;
}

function sauvePlace(id, type){		//types : 1 -> plein, 2 -> reduit, 3 -> gratuit
	for (var i = 0; i < placesPrises.length; i++) {
		if(placesPrises[i][0] == id){
				placesPrises[0][type] -= placesPrises[i][type]*1;		//on retire l'ancienne valeur
				placesPrises[i][type] = document.getElementById(type+"de"+id).value;
				placesPrises[0][type] += placesPrises[i][type]*1;		//on ajoute la nouvelle valeur
				affichePrixParPlace(id, type, placesPrises[i][type]);
				affichePrixParSpectacle(placesPrises[i]);
		}
	}
}

function dessinePlaceRouge(tab){	//dessine place avec conflit
	let adv = "Attention, vous ne pourrez pas assister au(x) spectacle(s) suivant(s) en même temps:\n";
	adv += "<ul>\n";
	for (var i = 1; i < tab.length; i++) {
		let bloc = csvjson[tab[i]];
		adv += "<li> <titrespectacle>" + bloc[2] + "</titrespectacle> à <Lieu>" + bloc[4] + "</Lieu> le <Horaire>" + bloc[0] + "</Horaire> à <Horaire>" + bloc[1] + "</Horaire></li>\n";
	}
	adv += "</ul>\n";
	let place = trouvePlace(tab[0]);
	let bloc = csvjson[tab[0]];
	let res = "<div class=bloc_rouge>"+"<button class='bouton_img' onclick='clickOnChoisir("+tab[0]+")'type='button'></button>"+adv+"<table class='table_select_place'><tr><td>"+"<div class='titrePlace'>";
	res += "<titrespectacle>" + bloc[2] + "</titrespectacle>\n</br>Le <Horaire>"+bloc[0]+"</Horaire> à <Horaire>"+bloc[1]+ "</Horaire>\n </br>à \n<Lieu>" + bloc[4] + "</Lieu>";
	res += "</div></td><td><div class='ventePlace'>";
	res += "<div class='tarif'> Plein tarif <div id='"+tab[0]+"v1'> </div> <input onchange='sauvePlace("+tab[0]+",1)' type='number' id='1de"+tab[0]+"' value='"+place[1]+"' min='0' max='100'>"+"</div> </br>";
	res += "<div class='tarif'> Tarif réduit <div id='"+tab[0]+"v2'> </div> <input onchange='sauvePlace("+tab[0]+",2)' type='number' id='2de"+tab[0]+"' value='"+place[2]+"' min='0' max='100'>"+"</div></br>";
	res += "<div class='tarif'> Gratuit Enfant <div id='"+tab[0]+"v3'> </div> <input onchange='sauvePlace("+tab[0]+",3)' type='number' id='3de"+tab[0]+"' value='"+place[3]+"' min='0' max='100'>"+"</div></br>";
	res += "</div></td><td>";
	res += "<div id='ts"+tab[0]+"'></div>"
	res += "</td></table></div>";
	return(res);
}

function dessinePlaceBleu(id){ 	//dessine place sans conflit
	let place = trouvePlace(id);
	let bloc = csvjson[id];
	let res = "<div class=bloc_bleu>"+"<button class='bouton_img' onclick='clickOnChoisir("+id+")'type='button'></button><table class='table_select_place'><tr><td>"+"<div class='titrePlace'>";
	res += "<titrespectacle>" + bloc[2] + "</titrespectacle>\n</br>Le <Horaire>"+bloc[0]+"</Horaire> à <Horaire>"+bloc[1]+ "</Horaire>\n </br>à \n<Lieu>" + bloc[4] + "</Lieu>";
	res += "</div></td><td><div class='ventePlace'>";
	res += "<div class='tarif'> Plein tarif <div id='"+id+"v1'> </div> <input onchange='sauvePlace("+id+",1)' type='number' id='1de"+id+"' value='"+place[1]+"' min='0' max='100'>"+"</div> </br>";
	res += "<div class='tarif'> Tarif réduit <div id='"+id+"v2'> </div> <input onchange='sauvePlace("+id+",2)' type='number' id='2de"+id+"' value='"+place[2]+"' min='0' max='100'>"+"</div></br>";
	res += "<div class='tarif'> Gratuit Enfant <div id='"+id+"v3'> </div> <input onchange='sauvePlace("+id+",3)' type='number' id='3de"+id+"' value='"+place[3]+"' min='0' max='100'>"+"</div></br>";
	res += "</div></td><td>";
	res += "<div id='ts"+id+"'></div>"
	res += "</td></table></div>";


	return res;
}

function dessineSelectionPlace(){
	let res = "</br><div class=bloc_bleu> <h2> Choisissez le nombre de place <h2> <p class='disclamer'> Attention, les prix affichés pour chaques spectacles ne prennent pas en compte l'offre 1 billet offert pour 5 achetés. Seul le prix total situé en bas de page est le prix final.</p></div>";
	for (var i = 0; i < panier.length; i++) {
		if(panier[i].length>1)	//si le spectacle est en conflit avec d'autre
			res += dessinePlaceRouge(panier[i]);
		else
			res += dessinePlaceBleu(panier[i][0]);
	}
	res += "<br><p id='total'> </p>";
	//console.log(res);
	document.getElementById("selectionPlace").innerHTML = res;
	return;
}

