<?php
//Cette classe représentera la connexion à la BDD. L'approche Singleton nous permettra d'être certain qu'il n'y ait pas plusieurs connexions initialisées

namespace Manager;

class PDOManager
{
	private static $instance = null; //contiendra l'instance de notre classe
	protected $pdo; //contiendra l'instance de PDO

	private function __construct(){//private donc non instanciable

	}

	private function __clone(){//Private donc non clonable

	}

	public static function getInstance(){
		if(is_null(self::$instance))
			self::$instance = new self; //équivaut à faire un newPDOManager

		return self::$instance;
	}

	public function getPdo(){
		require_once __DIR__.'/../../app/Config.php';
		 $config = new\Config; // je mets l'antislah car je précise que je sors du namespace dans lequel je suis qui est Manager et je vais dans le namespace général
		 $connect = $config->getParametersConnect();

		 try{
		 		$this->pdo = new \PDO("mysql:dbname=".$connect['dbname'].";host=".$connect['host'], $connect['user'], $connect['password'], array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
		 }

		 catch(\PDOException $e){//pareil la aussi on sort du namespace Manager

		 	echo 'Echec de connexion: '.$e ->getMessage();
		 }

		 return $this->pdo;
	}

}