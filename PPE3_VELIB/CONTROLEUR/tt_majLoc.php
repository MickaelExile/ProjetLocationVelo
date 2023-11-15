<?php
header('Content-Type: text/html;charset=UTF-8');
require_once ('../MODELE/VehiculeModele.class.php');
require_once ('../MODELE/LocationModele.class.php');
require_once ('../MODELE/VeloModele.class.php');
require_once ('../MODELE/VeloModeleElec.class.php');

$monModele = new VehiculeModele();
$monModeleV = new LocationModele();
$monModeleVelo = new VeloModele();
$monModeleVeloE = new VeloModeleElec();
$etat='';

if (isset($_GET['num'])&& isset($_GET['etat'])){
//numéro du vélo passé dans l'URL lors de l'appel de la page
	try{
		$etat='D';
		if ($_GET['etat']== "LOUER"){ //test de la valeur du bouton
			$etat='L';
			header('location:../VUE/UpdateVelosLocationsL.php?numV='.$_GET['num']);
		}
		if ($_GET['etat']== "DEPOSER"){
			$etat='D';
            header('location:../VUE/UpdateVelosLocations.php?numV='.$_GET['num']);
           }
		$monModele->changeEtat($etat,$_GET['num']);//requete presente dans le modele qui met à jour l'etat du vélo (numero fourni)
	} catch ( PDOException $pdoe ) {
		header('location:../VUE/consultationVelosLocation.php?error="ERREUR dans le changement d\'état du vélo"');
	}
}
if(isset($_POST['dateheureDep']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
  	$monModeleV->nouvelleDate($_POST['numV'] ,$_POST['dateheureDep']);
  	$monModeleVelo->nouvellePosition($_POST['numV'], $_POST['latitude'], $_POST['longitude']);
    header('location:../VUE/consultationVelosLocation.php?error="SUCCESS dans le changement d\'état du vélo et de la date de depôt"');
}
if(isset($_POST['dateheureDep']) && isset($_POST['codeB']))
  	{
  		$monModeleV->nouvelleDate($_POST['numV'] ,$_POST['dateheureDep']);
  		$monModeleVeloE->nouvelleBorneElec($_POST['numV'] ,$_POST['codeB']);
  		header('location:../VUE/consultationVelosLocation.php?error="SUCCESS dans le changement d état du vélo et de la borne"');
  	}
if(isset($_POST['dateheureLoc']) && isset($_POST['numA'])){
  	$monModeleV->nouvelleDateL($_POST['numV'] ,$_POST['dateheureLoc'],$_POST['numA']);
    header('location:../VUE/consultationVelosLocation.php?error="SUCCESS dans le changement d\'état du vélo et de la date de location"');
}
?>