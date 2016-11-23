<?php

class Autoload
{
	public static $nb =1; // permet de compter via un compteur, le nombre de fois que l'on passe dans l'autoload pour connaitre le chemin qui a été parcouru par l autoload pour nous seulement

	public static function className($className){
		//$className représente le mot que l'autoload trouve juste après le new et est associée au namespace
		//par exemple l'autoload va voir un new Controller\SalonsController et on aimerait que l'autoload fasse tout seul un include de Controller/SalonsController.php

		//echo'<hr/>'. self::$nb.'- Autoload:'.$className;//nous permet de voir, à titre d'infos quel chemin l'autoload a parcouru

		$tab = explode('\\', $className);// $tab est un array avec le nom de la classe fragmenté au niveau du '\'

		if($tab[0] == 'Controller' && $tab[1] != 'Controller'){
			// lorsqu il trouve le mot controller en 1er il faut qu il sorte de vendor et qu'il aille dans src et il trouvera le controleur dedans

			$path = __DIR__.'/../src/'.implode('/', $tab).'.php';
		}else{

			//sinon il reste dans le dossier vendor et va me chercher le fichier . php
			$path = __DIR__.'/'.implode('/',$tab).'.php';
			//le controller général lui parcontre est dans vendor

		}

		//echo "<br/>\n => $path<hr/>"; //nous permet de voir les classes instanciées et les chemins des fichiers inclus grace à l'autoload

		require $path; //require'../src/Controller/SalonsController.php' si j appelle SalonsController ou UtilisateurController bref si il y a Controller etc... ou sinon il fait require'/Manager/PDOManager.php'

		self::$nb++;
	}

}


spl_autoload_register(array('Autoload','className'));

/*
cette fonction se lance lorsqu'un 'new ' est demandé. Lorsqu'on utillise l'autoload sur une classe, on doit passer en argument le nom de la classe et la méthode à exécuter dans un array. De plus, il faut que la méthode soit statique
*/