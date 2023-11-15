<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleur.php');

$sessionService= false;
if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceTechnique") 
{
	$pageConsultationVelos = new PageSecuriseeService ("Consulter les vélos disponibles...");
	$sessionService= true;
	$listeVELO = listeVelosClassiques();//appel de la fonction dans le CONTROLEUR : page controleur.php
} 
else
{
	//si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
	$pageConsultationVelos = new PageBase ("Consulter les vélos disponibles...");
	$listeVELO = listeVelosClassiquesDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}

$pageConsultationVelos->contenu = '<section>
					<div class="col-md-6">
          <table class="table table-striped" class="table-responsive">
            <thead>	<tr><th>Numero du vélo</th><th>position GPS l</th><th>position GPS L</th><th>disponibilité</th><th></th></tr></thead><tbody>';
//parcours du résultat de la requete
foreach ($listeVELO as $unVELO)
{
 	if($unVELO->etatV == 'D')
 	{
 		$pageConsultationVelos->contenu .= '<tr><td>'.$unVELO->numV.'</td><td>'.$unVELO->latitudeV.'</td><td>'.$unVELO->longitudeV.'</td><td>'.$unVELO->etatV.'</td>';
 	}
 	else
 	{
 		$pageConsultationVelos->contenu .= '<tr><td>'.$unVELO->numV.'</td><td></td><td></td><td>'.$unVELO->etatV.'</td>';
 	}
   
	if ($sessionService== true)
	{// si on est connecté en tant que SERVICE
		$pageConsultationVelos->contenu .='<td><form class="form-inline" action="../CONTROLEUR/tt_majVelo.php" method="GET" >
			<input type="hidden" name="num" value='. $unVELO->numV.'>';
			if($unVELO->etatV=='D')
			{

				$pageConsultationVelos->contenu .='<input type="submit" class="btn btn-warning" name="etat" value="REPARER"/>';
			}
			else
			{
			$pageConsultationVelos->contenu .='<input type="submit" class="btn btn-success" name="etat" value="DISPONIBLE"/>';
		}
		$pageConsultationVelos->contenu .='</form></td></tr>';			
	}		
}

$listeVELO->closeCursor(); //pour liberer la memoire occupee par le resultat de la requete
$listeVELO = null; //pour une autre execution avec cette variable

$pageConsultationVelos->contenu .= '</tbody></table></div>';

// TRAITEMENT du RETOUR DE L'ERREUR par le controleur
if (isset($_GET['error']) && !empty($_GET['error'])) 
{
	$err = $_GET['error'];

	$pageConsultationVelos->zoneErreur = '<div id="infoERREUR" class="alert alert-success fade in">INFO :<a href="#" onclick="cacher();" class="close" data-dismiss="alert">&times;</a></div>';
	$verif = preg_match("/ERREUR/",$err); //verifie s'il y a le mot ERREUR dans le message retourné
	
	if ( $verif == TRUE ){
		$class ="alert alert-danger fade in";
	}
	else {
		$class ="alert alert-success fade in";
	}
	$pageConsultationVelos->scriptExec = "changerCouleurZoneErreur('".$class."');";	//ajout dans le tableau scriptExec du script à executer	
	$pageConsultationVelos->scriptExec = "montrer('.$err.');"; //ajout dans le tableau scriptExec du script à executer
}
$pageConsultationVelos->afficher();
?>