<?php
session_start();

require_once ('../Class/autoload.php');
require_once ('../CONTROLEUR/controleurBorne.php');
$sessionService= false;

if (isset($_SESSION ['mode']) && $_SESSION ['mode']=="serviceTechnique") {
	$pageConsultationBorne = new PageSecuriseeService ("Bornes disponibles");
	$sessionService= true;
	$listeBORNE = listeBornes();//appel de la fonction dans le CONTROLEUR : page controleur.php
}
else {
	//si on est pas connecté en tant que serviceTechnique, on ne voit que les vélos DISPONIBLES
	$pageConsultationVelos = new PageBase ("Bornes disponibles");
	$listeBORNE = listeBornes();//appel de la fonction dans le CONTROLEUR : page controleur.php
}
if($sessionService==true){
	$pageConsultationBorne->contenu .='<section>
		<article>
		<form class="form" id="formVelo" method="post" action="../CONTROLEUR/tt_majVeloElec.php">
		<input type="text" class="invisible" name="numV" id"numV" value="'.$_GET['numV'].' "required="required" />

		<div class="form-group">
			<label for="codeB"> Liste des bornes disponibles </label>
				<select class="form-control" name="codeB" id="codeB">';
				foreach($listeBORNE as $uneBORNE){
					$pageConsultationBorne->contenu .='
					<option value='.$uneBORNE->codeB.'>'.$uneBORNE->nomB. " ".$uneBORNE->numRueB." // ".$uneBORNE->nomrueB.'</option>';
				}
			$pageConsultationBorne->contenu.= '</select> </div>         
                <div class="form-group">
				<input type="submit" class="btn btn-default" name="btnValider" value="Valider"/>
                </div>
            </form>
			</article> </section>';
}
$pageConsultationBorne->afficher();
?>