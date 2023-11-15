<?php

require_once ('../MODELE/VeloModeleElec.class.php');

//permet à la VUE consultationVelosClassiques de récupérer la liste des vélos disponibles à la location
//pas besoin d'AJAX ici, cette récupération est faite au chargement de la page

function listeVelosElectriques()
{
$VELOELECMod = new VeloModeleElec();
return $VELOELECMod->getVelosElec(); //requete via le modele
}

function listeVelosElectriquesDisponibles()
{
$VELOELECMod = new VeloModeleElec();
return $VELOELECMod->getVelosElecDispo(); //requete via le modele
}

?>