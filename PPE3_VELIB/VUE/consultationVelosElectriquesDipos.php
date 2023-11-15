<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleurElec.php');

$sessionService= false;
if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceTechnique") {
	$pageConsultationVelosElectriques = new PageSecuriseeService ("Consulter les vélos éléctrique disponibles...");
	$sessionService= true;
	$listeVELO =  listeVelosElectriques();//appel de la fonction dans le CONTROLEUR : page controleur.php
} 
else {
	//si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
	$pageConsultationVelosElectriques = new PageBase ("Consulter les vélos éléctrique disponibles...");
	$listeVELO = listeVelosElectriquesDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}

$pageConsultationVelosElectriques->contenu = '<section>
					<div class="col-md-6">
          <table class="table table-striped" class="table-responsive">
            <thead>	<tr><th>Numero du vélo</th><th>Numero de la Borne</th><th>Nom de la borne</th><th>Numero de Rue de la borne</th><th>Nom de rue de la borne</th><th>Etat du vélo</th></tr></thead><tbody>';
//parcours du résultat de la requete
foreach ($listeVELO as $unVELO)
{
	if($unVELO->etatV == 'D')
 	{
 		$pageConsultationVelosElectriques->contenu .= '<tr><td>'.$unVELO->numV.'</td><td>'.$unVELO->codeB.'</td><td>'.$unVELO->nomB.'</td><td>'.$unVELO->numRueB.'</td><td>'.$unVELO->nomrueB.'</td><td>'.$unVELO->etatV.'</td>';
 	}
 	else
 	{
 		$pageConsultationVelosElectriques->contenu .= '<tr><td>'.$unVELO->numV.'</td><td></td><td></td><td></td><td></td><td>'.$unVELO->etatV.'</td>';
 	}

	if ($sessionService== true)
	{// si on est connecté en tant que SERVICE
		$pageConsultationVelosElectriques->contenu .='<td><form class="form-inline" action="../CONTROLEUR/tt_majVeloElec.php" method="GET" >
			<input type="hidden" name="num" value='. $unVELO->numV.'>';
			if($unVELO->etatV=='D')
			{
				$pageConsultationVelosElectriques->contenu .='<input type="submit" class="btn btn-warning" name="etat" value="REPARER"/>';
			}
			else
			{
			$pageConsultationVelosElectriques->contenu .='<input type="submit" class="btn btn-success" name="etat" value="DISPONIBLE"/>';
		}
		$pageConsultationVelosElectriques->contenu .='</form></td></tr>';
	}			
}
$listeVELO->closeCursor(); //pour liberer la memoire occupee par le resultat de la requete
$listeVELO = null; //pour une autre execution avec cette variable

$pageConsultationVelosElectriques->contenu .= '</tbody></table></div>';

// TRAITEMENT du RETOUR DE L'ERREUR par le controleur
if (isset($_GET['error']) && !empty($_GET['error'])) {
	$err = $_GET['error'];

	$pageConsultationVelosElectriques->zoneErreur = '<div id="infoERREUR" class="alert alert-success fade in">INFO :<a href="#" onclick="cacher();" class="close" data-dismiss="alert">&times;</a></div>';
	$verif = preg_match("/ERREUR/",$err); //verifie s'il y a le mot ERREUR dans le message retourné
	
	if ( $verif == TRUE ){
		$class ="alert alert-danger fade in";
	}
	else {
		$class ="alert alert-success fade in";
	}
	$pageConsultationVelosElectriques->scriptExec = "changerCouleurZoneErreur('".$class."');";	//ajout dans le tableau scriptExec du script à executer	
	$pageConsultationVelosElectriques->scriptExec = "montrer('.$err.');"; //ajout dans le tableau scriptExec du script à executer
}
$pageConsultationVelosElectriques->afficher();
?>