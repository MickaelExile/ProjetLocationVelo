<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleurLocation.php');
require_once ('../CONTROLEUR/controleurBorne.php');

if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceAdherent") {
  $UpdateVelosLocations = new PageSecuriseeAdherent ("Locations disponibles");
  $sessionService= false;
  $listeLOC = listeLocationsDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}
else {
  //si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
  $UpdateVelosLocations = new PageSecuriseeAdherent ("Locations disponibles");
  $listeLOC = listeLocationsDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}
if($sessionService==false)
{
  if($_GET['numV'] == 1 OR $_GET['numV'] == 2 OR $_GET['numV'] == 8 OR $_GET['numV'] == 9 OR $_GET['numV'] == 10 OR $_GET['numV'] == 11){
  $UpdateVelosLocations->contenu .='<section>
<article>
  <form class="form" id="formVelo" method="post" action="../CONTROLEUR/tt_majLoc.php">
    <input type="text" class="invisible" name="numV" id="numV" value="'.$_GET['numV'].'" required="required"/>

    <div class="form-group">
      <label for="dateheureDep"> Date et Heure du Depôt</label>
       <input type="datetime-local" class="form-control" name="dateheureDep"  id="dateheureDep" required="required"/>
    </div>

     <div class="form-group">
            <label for="latitude">Position GPS l</label>
            <input type="text" class="form-control" pattern ="^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$"  name="latitude"  id="latitude" required="required"/>
          </div>

          <div class="form-group">
            <label for="longitude">Position GPS L</label>
            <input type="text" class="form-control" pattern ="^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$" name="longitude"  id="longitude" required="required"/>
          </div>

    <div class="form-group">
          <input type="submit" class="btn btn-default" name="btnValider" value="Valider"/>
    </div>
  </form>
</article></section>';
}
else 
{
  $UpdateVelosLocations->contenu .='<section>
<article>
  <form class="form" id="formVelo" method="post" action="../CONTROLEUR/tt_majLoc.php">
    <input type="text" class="invisible" name="numV" id="numV" value="'.$_GET['numV'].'" required="required"/>

    <div class="form-group">
      <label for="dateheureDep"> Date et Heure du Depôt</label>
       <input type="datetime-local" class="form-control" name="dateheureDep"  id="dateheureDep" required="required"/>
    </div>

     <div class="form-group">
      <label for="codeB"> Liste des bornes disponibles </label>
        <select class="form-control" name="codeB" id="codeB">';
        $listeBORNE = listeBornes();
        foreach($listeBORNE as $uneBORNE){
          $UpdateVelosLocations->contenu .='
          <option value='.$uneBORNE->codeB.'>'.$uneBORNE->nomB. " ".$uneBORNE->numRueB." // ".$uneBORNE->nomrueB.'</option>';
        }
      $UpdateVelosLocations->contenu.= '</select> </div> 

    <div class="form-group">
          <input type="submit" class="btn btn-default" name="btnValider" value="Valider"/>
    </div>
  </form>
</article></section>';

}
}
$UpdateVelosLocations->afficher();
?>