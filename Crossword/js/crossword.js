// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
// Modificado por Juan Manuel Rivas Quiroz
(function($) {
	$ (function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var query = window.location.search.substring(1);
		var vars = query.split("=");
		var choi=vars[1];
		//console.log('test:' + choi);
		if(choi==1){
			var puzzleData = [
				{
					clue: "Rabbit",
					answer: "Conejo",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 4
				},
			 	{
					clue: "Mouse",
					answer: "Ratón",
					position: 2,
					orientation: "across",
					startx: 4,
					starty: 6
				},
				{
					clue: "Cat",
					answer: "Gato",
					position: 3,
					orientation: "across",
					startx: 1,
					starty: 7
				},
				{
					clue: "Dog",
					answer: "Perro",
					position: 4,
					orientation: "down",
					startx: 4,
					starty: 3 
				},
				{
					clue: "Tiger",
					answer: "Tigre",
					position: 5,
					orientation: "down",
					startx: 6,
					starty: 6
				},
				{
					clue: "Dolphin",
					answer: "Delfín",
					position: 6,
					orientation: "down",	
					startx: 8,
					starty: 1
				},
			] ;
		}else if(choi==2){
			var puzzleData = [
				{
					clue: "Zebra",
					answer: "Cebra",
					position: 1,
					orientation: "across",
					startx: 6,
					starty: 3
				},
			 	{
					clue: "Giraffe",
					answer: "Jirafa",
					position: 2,
					orientation: "across",
					startx: 1,
					starty: 4
				},
				{
					clue: "Horse",
					answer: "Caballo",
					position: 3,
					orientation: "across",
					startx: 4,
					starty: 7
				},
				{
					clue: "Cow",
					answer: "Vaca",
					position: 4,
					orientation: "down",
					startx: 6,
					starty: 1 
				},
				{
					clue: "Seal",
					answer: "Foca",
					position: 5,
					orientation: "down",
					startx: 5,
					starty: 4
				},
				{
					clue: "Frog",
					answer: "Rana",
					position: 6,
					orientation: "down",	
					startx: 7,
					starty: 6
				},
			] ;
		}else if(choi==3){
			var puzzleData = [
				{
					clue: "Watermelon",
					answer: "Sandía",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 2
				},
			 	{
					clue: "Banana",
					answer: "Banana",
					position: 2,
					orientation: "across",
					startx: 5,
					starty: 5
				},
				{
					clue: "Melon",
					answer: "Melón",
					position: 3,
					orientation: "across",
					startx: 2,
					starty: 6
				},
				{
					clue: "Apple",
					answer: "Manzana",
					position: 4,
					orientation: "down",
					startx: 6,
					starty: 1 
				},
				{
					clue: "Pear",
					answer: "Pera",
					position: 5,
					orientation: "down",
					startx: 8,
					starty: 2
				},
				{
					clue: "Grape",
					answer: "Uva",
					position: 6,
					orientation: "down",	
					startx: 10,
					starty: 3
				},
			] ;
		}else if(choi==5){
			var puzzleData = [
				{
					clue: "Teacher",
					answer: "Profesor",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 2
				},
			 	{
					clue: "Medic",
					answer: "Doctor",
					position: 2,
					orientation: "across",
					startx: 5,
					starty: 5
				},
				{
					clue: "Mailman",
					answer: "Cartero",
					position: 3,
					orientation: "across",
					startx: 9,
					starty: 8
				},
				{
					clue: "Firefighter",
					answer: "Bombero",
					position: 4,
					orientation: "down",
					startx: 3,
					starty: 1 
				},
				{
					clue: "Astrounaut",
					answer: "Astronauta",
					position: 5,
					orientation: "down",
					startx: 6,
					starty: 1
				},
				{
					clue: "Veterinary",
					answer: "Veterinario",
					position: 6,
					orientation: "down",	
					startx: 10,
					starty: 1
				},
			] ;
		}else if(choi==4){
			var puzzleData = [
				{
					clue: "Dinning Room",
					answer: "Comedor",
					position: 1,
					orientation: "across",
					startx: 4,
					starty: 4
				},
			 	{
					clue: "Beach",
					answer: "Playa",
					position: 2,
					orientation: "across",
					startx: 2,
					starty: 7
				},
				{
					clue: "Balcony",
					answer: "Balcón",
					position: 3,
					orientation: "across",
					startx: 1,
					starty: 2
				},
				{
					clue: "Kitchen",
					answer: "Cocina",
					position: 4,
					orientation: "down",
					startx: 4,
					starty: 2 
				},
				{
					clue: "Bathroom",
					answer: "Baño",
					position: 5,
					orientation: "down",
					startx: 9,
					starty: 1
				},
				{
					clue: "Home",
					answer: "Casa",
					position: 6,
					orientation: "down",	
					startx: 6,
					starty: 6
				},
			] ;
		}
		
	
		$('#puzzle-wrapper').crossword(puzzleData, choi);
		
	});

})(jQuery);
