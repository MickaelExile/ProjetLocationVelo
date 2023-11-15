/* JavaScript 
 * Copyright (c) 2018 F. de Robien
*/
/*
 * GESTION DU CLIC du bouton EN REPARATION
*/
function jsClickReparation(num){
	alert("click sur le bouton en réparation");
	console.log("ready!");
	var numV = 0;
	// lorsque l'on clique sur le bouton
	

	function() {
	       	numV =($(this).attr('id'));
		    alert ("numero du vélo selectionné : "+ numV);
});
		//APPEL du fichier de traitement (ici : tt_majVelo.php) 
		//qui va modifier l'état du vélo en fonction du numéro du vélo (numV)
		//et les renvoyer en JSON à cette page
		var filterDataRequest = $.ajax({
			url: '../CONTROLEUR/tt_majVelo.php',
			type: 'GET',
			data: 'num='+ numV, // on envoie le numero du vélo, 
			//on le testera avec $_GET['num']
			dataType: 'json'
		});

	//une fois réceptionné les donnees en JSON
	filterDataRequest.done(function(data) {
		console.log("success");
		console.log(data);
		$.each(data, function(index, value) {
			 $('#infoERREUR').append(index +'-'+ value);
			 $('td#etat').value="MIS EN REPARATION"; //On affiche que le vélo est bien mis en réparation 
			 //car on ne recharge pas toute la page juste pour cela, principe AJAX
		 		});	
	});
	filterDataRequest.fail(function(jqXHR, textStatus) {
			//alert("ERROR, jqXHR : "+ jqXHR.responseText + "textStatus : "+ textStatus );
			console.log( "error" );
			if (jqXHR.status === 0){alert("Not connect.n Verify Network.");}
			else if (jqXHR.status == 404){alert("Requested page not found. [404]");}
			else if (jqXHR.status == 500){alert("Internal Server Error [500].");}
			else if (textStatus === "parsererror"){alert("Requested JSON parse failed.");}
			else if (textStatus === "timeout"){alert("Time out error.");}
			else if (textStatus === "abort"){alert("Ajax request aborted.");}
			else{alert("Uncaught Error.n" + jqXHR.responseText);}
		});
		filterDataRequest.always(function() {
			console.log( "complete" );
		});
}; /*FIN DE LA FONCTION jsClickReparation*/

