<?php
require_once(__DIR__.'/../vendor/autoload.php');// obligatoire pour que ça fonctionne

$app = new Manager\Application; //interrupteur qui lance l'application
$app ->lancement();

// par exemple je pars sur une url du type index.php?controller=salons&action=afficheAll
//$controller = Controller\SalonsController
//action = AfficheAll
//$a = new Controller\SalonsController
//$a ->AfficheAll()

//donc je copie /colle index.php?controller=salons&action=afficheAll dans mon url et je teste que par exemple je récupère toutes les infos de tous mes salons

/*

if(isset($_GET['controller']) && $_GET['controller'] != ''){

	$controller = 'Controller\\'. ucfirst($_GET['controller']) . 'Controller';
	$action = $_GET['action'];

	$a = new $controller;

	if(isset($_GET['id'])){

		$a -> $action($_GET['id']);
	}else{
		$a -> $action();
	}
}
*/

//TEST 1: Test de l'autoload sur les entités :
//Salons:

//$salon = new Entity\Salons; //on teste le bon fonctionnement de notre autoload c bon il nous affiche bien nos infos pour nos 3 entités

//$salon -> setNom('Maïrah');
//echo $salon -> getNom();

//$message = new Entity\Messages;
//$message -> setCorps('I love my Natural Hair');
//echo $message->getCorps();

//$user = new Entity\Utilisateurs;
//$user ->setPseudo('Welly');
//echo $user->getPseudo();

//TEST2: PDOManager
//$pdom = Manager\PDOManager::getInstance(); //  car on ne peux pas faire de new vu que c un singleton
//var_dump($pdom);
//$pdom2 = Manager\PDOManager::getInstance();
//var_dump($pdom2);// c'est le meme objet SINGLETON
//$pdo = $pdom ->getPdo();
//var_dump($pdom);
//var_dump($pdo);

//TEST 3: EntityRepository

/*
$entityRepo = new Manager\EntityRepository;
var_dump($entityRepo);
$resultat = $entityRepo->find(10);
var_dump($resultat);

*/

//TEST 4: test d'un model (SalonReoisitory) et des fonctiond pour afficher les infos
/*	
$salon = new Repository\SalonsRepository;
//$infosSalon = $salon ->getAllSalon();
$infosSalon = $salon ->getSalonById(4);
var_dump($infosSalon);

*/

// TEST 5: test du contoller et de l'instanciation d'un repository et pour faire cela on a remplacé get_call_class() par la valeur en dur qui est 'Controller\SalonsController'
/*
$c = new Controller\Controller;
$repo = $c -> getRepository();
var_dump($repo);
var_dump($repo ->getAllSalon());
*/
//donc notre controller fonctionne bien au moins pour la partie qui permet de récupérer le bon repository
