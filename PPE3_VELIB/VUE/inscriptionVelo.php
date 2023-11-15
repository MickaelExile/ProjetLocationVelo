<?php
require '../Class/autoload.php';

$pageInscriptionVelo = new PageBase ( "Inscription du vélo..." );

if ($_GET['numV']){ //pour faire un Update
	$pageInscriptionVelo->contenu .= '<section>
		<article>
			<form class="form" id="formInscriptionVelo" method="post" action="../CONTROLEUR/tt_UpdateVelo.php">
    			<input type="text" class="invisible" name="numV"  id="idCLI" value='.$_GET['numV'].' required="required"/>
  				<div class="form-group">
    				<label for="codeB"> Numero de la borne </label>
    				<input type="text" class="form-control" name="codeB"  id="codeB" value='.$_GET['codeB'].' required="required"/>;
}

// TRAITEMENT du RETOUR DE L'ERREUR par le controleur
if (isset($_GET['error']) && !empty($_GET['error'])) {

	$err = $_GET['error']; //récupération du message d'ereeur envoyé par la page tt_AjoutClient.php (celui ci peut-être vide)
	
	$pageInscriptionVelo->zoneErreur = '<div id="infoERREUR" class="alert alert-success fade in"><strong>INFO : </strong><a href="#" onclick="cacher();" class="close" data-dismiss="alert">&times;</a></div>';
			
	$verif = preg_match("/ERREUR/",$err); //verifie s'il y a le mot ERREUR dans le message retourné
	if ( $verif == TRUE ){
		$class ="alert alert-danger fade in";
	}
	else {
		$class ="alert alert-success fade in";
	}
	$pageInscriptionVelo->scriptExec = "changerCouleurZoneErreur('".$class."');";	//ajout dans le tableau scriptExec du script à executer	
	$pageInscriptionVelo->scriptExec = "montrer('".$err."');"; //ajout dans le tableau scriptExec du script à executer
}
$pageInscriptionVelo->afficher();
 ?>