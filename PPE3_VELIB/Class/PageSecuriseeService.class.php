<?php
class PageSecuriseeService extends PageBase {
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
		
		$this->menu ='<div id="navbar" class="navbar navbar-inverse">
				<div class="navbar-header">
      				<a class="navbar-brand" href="../VUE/verifSessionOK.php">Déconnexion</a>
    			</div>
    
          <ul class="nav navbar-nav">
            <li><a href="index.php">VELIBERTE</a></li>
            <li><a href="consultationVelosClassiquesDipos.php">Vélos classiques </a></li>
            <li><a href="consultationVelosElectriquesDipos.php">Vélos électriques </a></li>					
			</ul>
		</div>';
		echo $this->menu;
	}
}?>