<?php

require_once ('../MODELE/LocationModele.class.php');

//permet à la VUE consultationVelosClassiques de récupérer la liste des vélos disponibles à la location
//pas besoin d'AJAX ici, cette récupération est faite au chargement de la page
function listeLocations()
{
$LOCMod = new LocationModele();
return $LOCMod->getLocation(); //requete via le modele
}


function listeLocationsDisponibles()
{
$LOCMod = new LocationModele();
return $LOCMod->getLocationDispo(); //requete via le modele
}
?>