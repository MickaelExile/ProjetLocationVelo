<?php
class PageSecuriseeAdherent extends PageBase {
	public function __construct($t) {
		parent::__construct($t);
	}
	
	/**
	 ***** Gestion du MENU******
	 */
	// REDEFINITON du menu par rapport à celui de page_base
	protected function affiche_menu() {
		
		// on rajoute dans le MENU 
		// le menu Déconnexion : possiblité de se deconnecter du mode administrateur
		// les memes pages de consultation des vélos mais avec des options en plus!
		
		$this->menu ='<div id="navbar" class="navbar navbar-dark" style="background-color: #7FDD4C;">
				<div class="navbar-header">
      				<a style="color: #303030" class="navbar-brand" href="../VUE/verifSessionOK.php">Déconnexion</a>
    			</div>
    
          <ul class="nav navbar-nav">
            <li><a style="color: #303030" href="indexAd.php">VELIBERTE</a></li>
            <li><a style="color: #303030" href="consultationVelosClassiquesDiposAd.php">Vélos classiques </a></li>
            <li><a style="color: #303030" href="consultationVelosElectriquesDiposAd.php">Vélos électriques </a></li>	
            <li><a style="color: #303030" href="consultationVelosLocation.php">Location de vélos </a></li>					
			</ul>
		</div>';
		echo $this->menu;
	}
}?>