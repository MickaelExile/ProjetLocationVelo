<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleur.php');
require_once ('../CONTROLEUR/controleurLocation.php');

$sessionService= false;
if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceTechnique") {
	$pageConsultationVelosLoc = new PageSecuriseeService ("Consulter les vélos à louer...");
	$sessionService= true;
	$listeVELO = listeLocations();//appel de la fonction dans le CONTROLEUR : page controleur.php
} 
else {
	//si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
	$pageConsultationVelosLoc = new PageSecuriseeAdherent ("Consulter les vélos à louer...");
	$listeVELO = listeLocationsDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}

$pageConsultationVelosLoc->contenu = '<section>
					<div class="col-md-6">
          <table class="table table-striped" class="table-responsive">
            <thead>	<tr><th>Numéro du vélo</th><th>Adhérent</th><th>Date et Heure de Location</th><th>Date et Heure de Dépôt</th><th>Disponibilité</th><th></th></tr></thead><tbody>';
//parcours du résultat de la requete
foreach ($listeVELO as $unVELO)
{
 	if($unVELO->etatV == 'D')
 	{
 		$pageConsultationVelosLoc->contenu .= '<tr><td>'.$unVELO->numV.'</td><td></td><td></td><td>'.$unVELO->dateheureDep.'</td><td>'.$unVELO->etatV.'</td>';
 	}
 	else
 	{
 		$pageConsultationVelosLoc->contenu .= '<tr><td>'.$unVELO->numV.'</td><td>'.$unVELO->prenomA.'</td><td>'.$unVELO->dateheureLoc.'</td><td></td><td>'.$unVELO->etatV.'</td>';
 	}
   
	if ($sessionService== false)
	{// si on est connecté en tant que SERVICE
		$pageConsultationVelosLoc->contenu .='<td><form class="form-inline" action="../CONTROLEUR/tt_majLoc.php" method="GET" >
			<input type="hidden" name="num" value='. $unVELO->numV.'>';
			if($unVELO->etatV=='D')
			{

				$pageConsultationVelosLoc->contenu .='<input type="submit" class="btn btn-warning" name="etat" value="LOUER"/>';
			}
			else
			{
			$pageConsultationVelosLoc->contenu .='<input type="submit" class="btn btn-success" name="etat" value="DEPOSER"/>';
		}
		$pageConsultationVelosLoc->contenu .='</form></td></tr>';			
	}		
}

$listeVELO->closeCursor(); //pour liberer la memoire occupee par le resultat de la requete
$listeVELO = null; //pour une autre execution avec cette variable

$pageConsultationVelosLoc->contenu .= '</tbody></table></div>';

// TRAITEMENT du RETOUR DE L'ERREUR par le controleur
if (isset($_GET['error']) && !empty($_GET['error'])) 
{
	$err = $_GET['error'];

	$pageConsultationVelosLoc->zoneErreur = '<div id="infoERREUR" class="alert alert-success fade in">INFO :<a href="#" onclick="cacher();" class="close" data-dismiss="alert">&times;</a></div>';
	$verif = preg_match("/ERREUR/",$err); //verifie s'il y a le mot ERREUR dans le message retourné
	
	if ( $verif == TRUE ){
		$class ="alert alert-danger fade in";
	}
	else {
		$class ="alert alert-success fade in";
	}
	$pageConsultationVelosLoc->scriptExec = "changerCouleurZoneErreur('".$class."');";	//ajout dans le tableau scriptExec du script à executer	
	$pageConsultationVelosLoc->scriptExec = "montrer('.$err.');"; //ajout dans le tableau scriptExec du script à executer
}
$pageConsultationVelosLoc->afficher();
?>