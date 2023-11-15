<?php
header('Content-Type: text/html;charset=UTF-8');
require_once ('../MODELE/VehiculeModele.class.php');
require_once ('../MODELE/VeloModeleElec.class.php');

$monModele = new VehiculeModele();
$monModeleV = new VeloModeleElec();
$etat='';

if (isset($_GET['num'])&& isset($_GET['etat'])){
//numéro du vélo passé dans l'URL lors de l'appel de la page
	try{
		$etat='D';
		if ($_GET['etat']== "REPARER"){ //test de la valeur du bouton
			$etat='R';
			header('location:../VUE/consultationVelosElectriquesDipos.php?error="SUCCESS le changement d\'état du vélo a été effectué "');
		}
		if ($_GET['etat']== "DISPONIBLE"){
			$etat='D';
            header('location:../VUE/UpdateVeloBorne.php?numV='.$_GET['num']);
           }
		$monModele->changeEtat($etat,$_GET['num']);//requete presente dans le modele qui met à jour l'etat du vélo (numero fourni)
	} catch ( PDOException $pdoe ) {
		header('location:../VUE/consultationVelosElectriquesDipos.php?error="ERREUR dans le changement d\'état du vélo"');
	}
}
if(isset($_POST['codeB'])){
  	$monModeleV->nouvelleBorneElec($_POST['numV'] ,$_POST['codeB']);
    header('location:../VUE/consultationVelosElectriquesDipos.php?error="SUCCESS dans le changement d état du vélo et de la borne"');
}
?>