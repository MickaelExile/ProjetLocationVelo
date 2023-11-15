<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleurElec.php');

$sessionService= false;
if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceTechnique") {
	$pageInscriptionVeloElecElec = new PageSecuriseeService ("Consulter les vélos éléctriques disponibles...");
	$sessionService= true;
	$listeVELO = listeVelosElectriques();//appel de la fonction dans le CONTROLEUR : page controleur.php
} 
else {
	//si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
	$pageInscriptionVeloElec = new PageBase ("Consulter les vélos éléctriques disponibles...");
	$listeVELO = listeVelosElectriquesDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}

$pageInscriptionVeloElec = new PageSecuriseeService ( "Modification du vélos éléctrique..." );

if ($_GET['numV']){ //pour faire un Update
	$pageInscriptionVeloElec->contenu .= '<section>
		<article>
			<form class="form" id="formInscriptionVeloElec" method="post" action="../CONTROLEUR/tt_UpdateVeloElec.php">
    			<input type="text" class="invisible" name="numV"  id="numV" value='.$_GET['numV'].' required="required"/>
  				<div class="form-group">
    				<label for="codeB">Numero de la borne</label>
    				<input type="num" class="form-control" name="codeB"  id="codeB" value='.$_GET['codeB'].' required="required"/>
  				<div class="form-group">
				<input type="submit" class="btn btn-default" name="btnValiderClient" value="Valider"/></div>
				</form>
</article> </section>';
}
else{ // ajout du client 
$pageInscriptionVeloElec->contenu .= '<section>
		<article>
			<form class="form" id="formInscriptionVeloElec" method="post" action="../CONTROLEUR/tt_AjoutVeloElec.php">
				
  				<div class="form-group">
    				<label for="codeB">Numero de borne</label>
    				<input type="text" class="form-control" name="codeB"  id="codeB"  required="required"/>
  				</div>
    			<div class="form-group">
    				<label for="nomB">Nom borne </label>
    				<input type="text" class="form-control" name="nomB"  id="nomB" required="required" />
  				</div>
				<div class="form-group">
    				<label for="numRueB">Numero de rue borne </label>
    				<input type="mail" class="form-control" name="numRueB"  id="numRueB" required="required" />
    			</div>
    			<div class="form-group">
    				<label for="nomrueB">Nom de rue borne </label>
    				<input type="tel" class="form-control" name="nomrueB"  id="nomrueB"
    				required="required"/>
  				
  				</div>
  				<div class="form-group">
				<input type="submit" class="btn btn-default" name="btnValiderClient" value="Valider"/></div>
				</form>
</article> </section>';
}
// TRAITEMENT du RETOUR DE L'ERREUR par le controleur
if (isset($_GET['error']) && !empty($_GET['error'])) {

	$err = $_GET['error']; //récupération du message d'ereeur envoyé par la page tt_AjoutClient.php (celui ci peut-être vide)
	
	$pageInscriptionVeloElec->zoneErreur = '<div id="infoERREUR" class="alert alert-success fade in"><strong>INFO : </strong><a href="#" onclick="cacher();" class="close" data-dismiss="alert">&times;</a></div>';
			
	$verif = preg_match("/ERREUR/",$err); //verifie s'il y a le mot ERREUR dans le message retourné
	if ( $verif == TRUE ){
		$class ="alert alert-danger fade in";
	}
	else {
		$class ="alert alert-success fade in";
	}
	$pageInscriptionVeloElec->scriptExec = "changerCouleurZoneErreur('".$class."');";	//ajout dans le tableau scriptExec du script à executer	
	$pageInscriptionVeloElec->scriptExec = "montrer('".$err."');"; //ajout dans le tableau scriptExec du script à executer
}

$pageInscriptionVeloElec->afficher();
?>