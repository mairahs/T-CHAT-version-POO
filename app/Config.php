<?php

class Config
{
	protected $parameters;
	public function __construct(){// DIR constante magique qui retourne le dossier dans lequel je me trouve c'est à dire en l'occurrence app il renvoit le chemin absolu cette class a juste vocation a récupéré les infos de parameters notamment les paramètres de connexion 
		require __DIR__ .'/config/parameters.php';
		$this->parameters = $parameters;
	}

	public function getParametersConnect(){
		return $this ->parameters['connect'];
	}
}

//$config = new Config;
//var_dump($config->getParametersConnect()); //on récupère bien nos infos de connexion donc c'est parfait