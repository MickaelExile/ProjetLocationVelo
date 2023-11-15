<?php
header('Content-Type: text/html;charset=UTF-8');
require_once ('../MODELE/VehiculeModele.class.php');
require_once ('../MODELE/VeloModele.class.php');

$monModele = new VehiculeModele ();
$monModeleV = new VeloModele ();
$etat='';

if (isset($_GET['num'])&& isset($_GET['etat'])){
//numéro du vélo passé dans l'URL lors de l'appel de la page
	try{
		if ($_GET['etat']== "REPARER"){ //test de la valeur du bouton
			$etat='R';
			header('location:../VUE/consultationVelosClassiquesDipos.php?error="SUCCESS dans le changement d\'état du vélo"');
		}
		if($_GET['etat']== "DISPONIBLE"){
			$etat='D';
			header('location:../VUE/UpdateVelosClassiques.php?numV='.$_GET['num']);
		}
		$monModele->changeEtat($etat,$_GET['num']);//requete presente dans le modele qui met à jour l'etat du vélo (numero fourni)
	} catch ( PDOException $pdoe ) {
		header('location:../VUE/consultationVelosClassiquesDipos.php?error="ERREUR dans le changement d\'état du vélo"');
	}

}

if(isset($_POST['latitude']) && isset($_POST['longitude'])){
	$monModeleV->nouvellePosition($_POST['numV'], $_POST['latitude'], $_POST['longitude']);
	header('location:../VUE/consultationVelosClassiquesDipos.php?error="SUCCESS le changement d\'état du vélo a été effectué "');
}
?>