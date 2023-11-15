<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleur.php');

$sessionService= false;
if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceTechnique") {
	$UpdateVelosClassiques = new PageSecuriseeService ("Consulter les vélos classique disponibles...");
	$sessionService= true;
	$listeVELO = listeVelosClassiques();//appel de la fonction dans le CONTROLEUR : page controleur.php
}
else {
	//si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
	$UpdateVelosClassiques = new PageBase ("Consulter les vélos classique disponibles...");
	$listeVELO = listeVelosClassiquesDisponibles();//appel de la fonction dans le CONTROLEUR : page controleur.php
}

if($sessionService==true){ //pour faire un Update
	$UpdateVelosClassiques->contenu .= '<section>
		<article>
			<form class="form" id="formVelo" method="post" action="../CONTROLEUR/tt_majVelo.php">
    			<input type="text" class="invisible" name="numV"  id="numV" value="'.$_GET['numV'].'" required="required"/>

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
$UpdateVelosClassiques->afficher();
?>