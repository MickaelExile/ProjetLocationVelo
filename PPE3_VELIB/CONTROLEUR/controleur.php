<?php

require_once ('../MODELE/VeloModele.class.php');

//permet à la VUE consultationVelosClassiques de récupérer la liste des vélos disponibles à la location
//pas besoin d'AJAX ici, cette récupération est faite au chargement de la page

function listeVelosClassiques()
{
$VELOMod = new VeloModele();
return $VELOMod->getVelos(); //requete via le modele
}

function listeVelosClassiquesDisponibles()
{
$VELOMod = new VeloModele();
return $VELOMod->getVelosDispo(); //requete via le modele
}

?>


