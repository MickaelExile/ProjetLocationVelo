<?php
require_once '../Class/Connexion.class.php';

class VeloModele 
{

	private $idc = null;

	public function __construct() 
	{
		// creation de la connexion afin d'executer les requetes
		try {
			$this->idc = Connexion::connect();
			//mettre ICI les requêtes préparées (on fait des requetes préparées dès qu'il y a une élément
            // provenant de l'utilisateur et qui passera en paramètre)
            $this->reqnouvellePosition = $this->idc->prepare('UPDATE velo SET latitudeV=:latitudeV , longitudeV=:longitudeV WHERE numV=:numV;');

		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}
	
	public function getVelos() 
	{
		// recupere TOUS les vélos classiques 
		if ($this->idc) {
			$req ="SELECT * from velo INNER JOIN vehicule ON velo.numV = vehicule.numV;";
			$result = $this->idc->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
	
	public function getVelosDispo() {
		// recupere TOUS les vélos classiques disponibles à la location
		if ($this->idc) {
			$req ="SELECT * from velo 
			INNER JOIN vehicule ON velo.numV = vehicule.numV 
			WHERE etatV='D'";
			$result = $this->idc->query($req);
			Connexion::disconnect();
			return $result;
		}
	}	
	public function updateLongLat($numVelo){
		if($this->idc){
			$req ="UPDATE velo SET velo.latitudeV = NULL , velo.longitudeV = NULL WHERE velo.numV = ".$numVelo.";";
			$result = $this->idc->exec($req);
			Connexion::disconnect();
		}
	}

	public function nouvellePosition($numVelo, $updateLatitude, $updateLongitude){
		$this->reqnouvellePosition->bindParam(':numV', $numVelo);
		$this->reqnouvellePosition->bindParam(':latitudeV', $updateLatitude);
		$this->reqnouvellePosition->bindParam(':longitudeV', $updateLongitude);
		$this->reqnouvellePosition->execute();
		Connexion::disconnect();
	}
	
}
	