<?php
require_once '../Class/Connexion.class.php';

class LocationModele {

	private $idl = null;

	public function __construct() {
		// creation de la connexion afin d'executer les requetes
		try {
			$this->idl = Connexion::connect();
			//mettre ICI les requêtes préparées (on fait des requetes préparées dès qu'il y a une élément
            // provenant de l'utilisateur et qui passera en paramètre)
             $this->reqnouvelleDate = $this->idl->prepare('UPDATE louer SET dateheureDep=:dateheureDep WHERE numV=:numV;');
             $this->reqnouvelleDateL = $this->idl->prepare('UPDATE louer SET dateheureLoc=:dateheureLoc, numA=:numA WHERE numV=:numV;');

		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}
	
	public function getLocation() {
		// recupere Toutes les bornes
		if ($this->idl) {
			$req ="SELECT * from louer
			INNER JOIN vehicule ON vehicule.numV=louer.numV
			INNER JOIN adherent ON adherent.numA=louer.numA;";
			$result = $this->idl->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
	public function getLocationDispo() {
		// recupere Toutes les bornes
		if ($this->idl) {
			$req ="SELECT * from louer
			INNER JOIN vehicule ON vehicule.numV=louer.numV
			INNER JOIN adherent ON adherent.numA=louer.numA
			WHERE etatV='D'OR etatV='L'";
			$result = $this->idl->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
	public function updatedateheureDep($numVelo){
		if($this->idl){
			$req ="UPDATE louer SET louer.dateheureDep = Null WHERE louer.numV = ".$numVelo.";";
			$result = $this->idl->exec($req);
			Connexion::disconnect();
		}
	}
	public function updatedateheureLoc($numVelo){
		if($this->idl){
			$req ="UPDATE louer SET louer.dateheureLoc = Null, louer.numA = Null WHERE louer.numV = ".$numVelo.";";
			$result = $this->idl->exec($req);
			Connexion::disconnect();
		}
	}
	public function nouvelleDate($numVelo, $updatedateheureDep){
		$this->reqnouvelleDate->bindParam(':numV', $numVelo);
		$this->reqnouvelleDate->bindParam(':dateheureDep', $updatedateheureDep);
		$this->reqnouvelleDate->execute();
		Connexion::disconnect();
	}
	public function nouvelleDateL($numVelo, $updatedateheureLoc, $numAdh){
		$this->reqnouvelleDateL->bindParam(':numV', $numVelo);
		$this->reqnouvelleDateL->bindParam(':dateheureLoc', $updatedateheureLoc);
		$this->reqnouvelleDateL->bindParam(':numA', $numAdh);
		$this->reqnouvelleDateL->execute();
		Connexion::disconnect();
	}
		 
}