var resultat = []
var troupe = [];
var representation = [];
var lieu = [];

function init(){
	$.ajax(
		{url: "Processins.php", async : false, success: function(result){
			resultat = result;
			}});
	trieParLieu();
}

function estDans(tab, idx, elt){
	for (let i = 0; i < tab.length; i++) {
		if(tab[i][idx] === elt)
			return i;
	}
	return -1;
}

function trieParLieu(){
	let nbLieu = 0;
	
	for(let i = 0; i < resultat.length; i++){
		let k = estDans(lieu, 0, resultat[i][1]);
		if(k > -1){
			for(let j = 1; j < 7; j++){
				lieu[k][j] = parseInt(lieu[k][j]) + parseInt(resultat[i][j+1]);
				
			}
		} 
		else {
			lieu[nbLieu] = [];
			lieu[nbLieu][0] = resultat[i][1];
			for(let j = 1; j < 7; j++){
				lieu[nbLieu][j] = parseInt(resultat[i][j+1]);
				
			}
			nbLieu++;
		}
	}
	console.log(lieu);
}