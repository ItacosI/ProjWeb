	var csvjson = [];

function initJson(src){ //initialise csvjson pour l'utiliser en var globale
	csvjson = src;
}

function isIn(tab, target){
	for (var i = 0; i < tab.length; i++)
		if(tab[i] == target)
			return true;
	return false;
}

function chercheEnsembleDate(){ // Renvoie l'ensemble des dates figurant dans le csv (dans l'ordre où ils apparaissent dans le fichier)
	let res = new Array();

	for (var i = 0; i < csvjson.length; i++) {
		if(!isIn(res, csvjson[i][0]))
			res.push(csvjson[i][0]);
	}
	return res;
}

function creerBloc(bloc, id){
		let res = "<div class='shadowboxNormal'>\n<Horaire>"+bloc[0]+"</Horaire><Horaire> "+bloc[1]+ "</Horaire>\n</br>\n<Lieu>" + bloc[4] + "</Lieu></br><button class='boutonAEnfoncer' type='button' name='"+id+"' onclick=clickOnChoisir("+id+")>O</button><br/><titrespectacle>" + bloc[2] + "</titrespectacle>\n</div>\n";
		return res;

}

function creerTableJour(jour){
	let cpt = 0;
	let res = "<div class='emballage'>";
	for (var i = 0; i < csvjson.length; i++) {
		if(jour == csvjson[i][0]){
			if(cpt%4 == 3)
				res += "</div>";
			cpt++;

			if(cpt%4 == 0){
				res += "<div class='emballage'>";
				cpt++;
			}
			
			res+= creerBloc(csvjson[i], i);
		}
	}

	while(cpt < 15){
		if(cpt%4 == 3)
			res += "</div>";
		cpt++;

		if(cpt%4 == 0){
			res += "<div class='emballage'>";
			cpt++;
		}
		res+="	<div class='shadowboxVide'>\n<Horaire></Horaire><Horaire></Horaire>\n</br>\n<Lieu></Lieu></br><titrespectacle></titrespectacle>\n</div>\n";
		
	}
	res+="</div>";
	return res;
}

function appel(csv){
	//console.log(csv);
	initJson(csv);
	document.getElementById("mod").innerHTML = dessineTableau();
}

function dessineTableau(){
	let cpt = 0;
	let res ="\n\n ";
	let date = chercheEnsembleDate();

	for (var i = 0; i < date.length; i++) {
		res+= "<div class='jourEntier'> <h2>"+date[i]+"</h2>"+creerTableJour(date[i])+"</div>";
	}
	return res;
}








