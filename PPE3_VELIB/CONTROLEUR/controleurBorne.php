<?php

require_once ('../MODELE/VeloBorneModele.class.php');

//permet à la VUE consultationVelosClassiques de récupérer la liste des vélos disponibles à la location
//pas besoin d'AJAX ici, cette récupération est faite au chargement de la page

function listeBornes(){
$BORNEMod = new BorneModele();
return $BORNEMod->getBorne(); //requete via le modele
}
?>