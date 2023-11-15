<?php
require_once '../Class/Connexion.class.php';

class VeloModeleElec 
{

	private $idc = null;

	public function __construct() 
	{
		// creation de la connexion afin d'executer les requetes
		try
		{
			$this->idc = Connexion::connect();
			//mettre ICI les requêtes préparées (on fait des requetes préparées dès qu'il y a une élément
            // provenant de l'utilisateur et qui passera en paramètre)
            $this->reqnouvelleBorne = $this->idc->prepare('UPDATE veloelectrique SET codeB=:codeB 
            	WHERE numV=:numV;');
		
		} catch ( PDOException $e ) {
			echo "<h1>probleme access BDD</h1>";
		}
	}
	public function getVelosElec() 
	{
		// recupere TOUS les vélos electriques
		if ($this->idc) {
			$req ="SELECT * from veloelectrique 
			INNER JOIN vehicule ON veloelectrique.numV = vehicule.numV
			LEFT JOIN borne ON veloelectrique.codeB = borne.codeB;";
			$result = $this->idc->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
	
	public function getVelosElecDispo() {
		// recupere TOUS les vélos electriques disponibles à la location
		if ($this->idc) {
			$req ="SELECT * from veloelectrique 
			INNER JOIN vehicule ON vehicule.numV = veloelectrique.numV 
			INNER JOIN borne ON borne.codeB = veloelectrique.codeB
			WHERE etatV='D'";
			$result = $this->idc->query($req);
			Connexion::disconnect();
			return $result;
		}
	}
	    public function NouvelleBorneElec ($numVelo, $numBorne) {
		// recupere TOUS les vélos classiques disponibles à la location
		$this->reqnouvelleBorne->bindParam(':numV',$numVelo);		
		$this->reqnouvelleBorne->bindParam(':codeB',$numBorne);
    	$this->reqnouvelleBorne->execute();		
    	Connexion::disconnect();
    }
		
	
}
	