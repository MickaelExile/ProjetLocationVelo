<?php
require_once '../Class/Connexion.class.php';

class ConnexionModele {

	private $idco = null;

	public function __construct() {
		// creation de la connexion afin d'executer les requetes
		try {
			$this->idco = Connexion::connect();
			//mettre ICI les requêtes préparées (on fait des requetes préparées dès qu'il y a une élément
            // provenant de l'utilisateur et qui passera en paramètre)

		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}
	
	public function getAdherent() {
		// recupere Toutes les bornes
		if ($this->idco) {
			$req ="SELECT * from adherent;";
			$result = $this->idco->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
		 
}