function genJSON(){
	console.log(numb);






}

genJSON();












/* ancien model
function starter(){ //génère la zone de rendu des tests
	var stdOut;
	for (var i = 0; i < 16; i++) {	
		stdOut = stdOut + "<p id='test"+i+"'></p>\n";
	}
	document.write(stdOut);
}
starter();

function test(){ // Test les différentes checkbox
	var specChoisis="{";
	for (var i = 0; i < 16 ; i++) {	
		if($("#S"+i).is(":checked")){
			$("#test"+i).html("OK");
		specChoisis= specChoisis + []
		} else {
			$("#test"+i).html("NOPE");
		}
	}
}

var int=self.setInterval(test, 60); //reroll de la fonction*/
