<?php

require_once ('../MODELE/AdherentModele.class.php');

//permet à la VUE consultationVelosClassiques de récupérer la liste des vélos disponibles à la location
//pas besoin d'AJAX ici, cette récupération est faite au chargement de la page

function listeAdherents(){
$AdherentMod = new AdherentModele();
return $AdherentMod->getAdherent(); //requete via le modele
}
?>