<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleurLocation.php');
require_once ('../CONTROLEUR/controleurAdherent.php');

if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceAdherent") {
  $UpdateVelosLocationsL = new PageSecuriseeAdherent ("Locations disponibles");
  $sessionService= false;
  $listeLOC = listeLocationsDisponibles();
  $listeAdherent = listeAdherents();//appel de la fonction dans le CONTROLEUR : page controleur.php
}
else {
  //si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
  $UpdateVelosLocationsL = new PageSecuriseeAdherent ("Locations disponibles");
  $listeLOC = listeLocationsDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
  $listeAdherent = listeAdherents();
}
if($sessionService==false){
  $UpdateVelosLocationsL->contenu .='<section>
<article>
  <form class="form" id="formVelo" method="post" action="../CONTROLEUR/tt_majLoc.php">
    <input type="text" class="invisible" name="numV" id="numV" value="'.$_GET['numV'].'" required="required"/>
    <div class="form-group">
      <label for="numA"> Liste des adherents disponibles </label>
        <select class="form-control" name="numA" id="numA">';
        foreach($listeAdherent as $unAdh){
          $UpdateVelosLocationsL->contenu .='
          <option value='.$unAdh->numA.'>'.$unAdh->nomA. " ".$unAdh->prenomA.'</option>';
        }
      $UpdateVelosLocationsL->contenu.= '</select> </div> 

    <div class="form-group">
      <label for="dateheureLoc"> Date et Heure de la location</label>
       <input type="datetime-local" class="form-control" name="dateheureLoc"  id="dateheureLoc" required="required"/>
    </div>

    <div class="form-group">
          <input type="submit" class="btn btn-default" name="btnValider" value="Valider"/>
    </div>
  </form>
</article></section>';
}
$UpdateVelosLocationsL->afficher();
?>