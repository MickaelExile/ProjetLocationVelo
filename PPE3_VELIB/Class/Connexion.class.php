<?php
require_once 'MyPDO.class.php';
class Connexion 
{
	// variable STATIC : à portée de classe, une seule valeur pour toutes les instances
    private static $dbName = 'Database_SLAM' ;
    private static $dbHost = '192.168.158.10' ;
    private static $dbUsername = 'mexile';
    private static $dbUserPassword = 'ExileMickael23';
     
    private static $cont  = null; //une seule variable pour toutes les connexions
     
    public function __construct() {
        die('cette classe n\'est pas instanciable');
    }
     
    public static function connect()// Une seule connexion pour toute l'application
    {
       if ( self::$cont ==null )
       {     
        try
        {
          self::$cont =  new MyPDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
          self::$cont->exec ( 'SET NAMES utf8');

        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}