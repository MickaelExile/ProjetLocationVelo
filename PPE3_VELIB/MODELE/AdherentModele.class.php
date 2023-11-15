<?php
require_once '../Class/Connexion.class.php';

class AdherentModele {

	private $idc = null;

	public function __construct() {
		// creation de la connexion afin d'executer les requetes
		try {
			$this->idc = Connexion::connect();
			//mettre ICI les requêtes préparées (on fait des requetes préparées dès qu'il y a une élément
            // provenant de l'utilisateur et qui passera en paramètre)

		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}
	
	public function getAdherent() {
		// recupere Toutes les bornes
		if ($this->idc) {
			$req ="SELECT numA, nomA, prenomA, loginA, mdpA from adherent ;";
			$result = $this->idc->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
		 
}