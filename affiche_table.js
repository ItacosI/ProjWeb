function isIn(tab, target){
	for (var i = 0; i < tab.length; i++)
		if(tab[i] == target)
			return true;
	return false;
}

function chercheEnsembleDate(csvjson){ // Renvoie l'ensemble des dates figurant dans le csv (dans l'ordre où ils apparaissent dans le fichier)
	let res = new Array();

	for (var i = 0; i < csvjson.length; i++) {
		if(!isIn(res, csvjson[i][0]))
			res.push(csvjson[i][0]);
	}
	return res;
}

function creerBloc(bloc){
		let res = "<p>"+bloc[1]+ " " + bloc[4] + "/" + bloc[3] + " " + bloc[2] + "</p>\n";
		return res;

}

function creerTableJour(jour, csvjson){
	let cpt = 0;
	let res ="\n<table>\n <th>\n" + jour + "</th>\n <tr>\n  ";
	for (var i = 0; i < csvjson.length; i++) {
		if(jour == csvjson[i][0]){
			if(cpt%5 == 4)
				res += "\n </tr>\n";
			cpt++;
			if(cpt%5 == 0){
				res += " <tr>\n  ";
				cpt++;
			}
			res+= "<td>"+creerBloc(csvjson[i])+"</td>";
		}
	}
	res+="\n </tr>\n</table>";
	return res;
}

function appel(csvjson){
	console.log("res = " + dessineTableau(csvjson));
	document.getElementById("mod").innerHTML = dessineTableau(csvjson);
}

function dessineTableau(csvjson){
	let cpt = 0;
	let res ="\n<table>\n <tr>\n  ";
	let date = chercheEnsembleDate(csvjson);

	for (var i = 0; i < date.length; i++) {
		if(cpt%3 == 2)
			res += "\n </tr>\n";
		cpt++;
		if(cpt%3 == 0){
			res += " <tr>\n  ";
			cpt++;
		}
		res+= "<td>"+creerTableJour(date[i], csvjson)+"</td>";
	}
	res+="\n </tr>\n</table>";
	return res;
}








