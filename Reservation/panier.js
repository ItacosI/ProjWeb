var panier = [];

function swapPanier(idJson){					//permet le switch a chaque bouton
	let found = false;
	for (var i = 0; i < panier.length; i++) {
		if(found){
			panier[i-1] == panier[i];
		}else{
			if(panier[i] == idJson){
				found = true;
			}
		}
	}

	if(found){
		panier.pop();
	} else {
		panier.push(idJson);
	}
	console.log(panier);
	return;
}



function dessineSelectionPlace(){
	///dessiner la seletion des places
}
