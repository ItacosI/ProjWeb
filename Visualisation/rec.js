
		var Troupe = [];
		var Representation = [];
		var lieu =new Array ();
		
		function initi(){
		var Troupe = [];
		var Representation = [];
		var lieu = new Array ();
		
		
			$.ajax(
				{url: "Processins.php", success: function(result){
					Representation = result;
					let nbLieu = 0;
					
					console.log(Representation.lenght);
					
					for(var i = 0; i <30; i ++){
						
						let estDedans = false;
						
						for(j = 0; j < nbLieu; j++){
							if(lieu[j][0]==result[i][1])
							estDedans = true;
						}
					
						if(!estDedans){
							lieu.push(new Array([result[i][1], result[i][2], result[i][3]]));
							nbLieu++;
						}		
					
						
							for(let j = 0; i < result.lenght; i ++){
								let cpt = [];
								if(result [j][1] == lieu[i][0]){
									for(let k = 0; k < 6; k++){
										cpt[k] = cpt[k] +result [i][6 + k];
										lieu[i][k+1].push(cpt[k]);
									}
									
								}	
							}
					}
					document.getElementById("apJs").innerHTML = lieu;
					
					console.log(lieu);
			}
			}
			);


			  }
