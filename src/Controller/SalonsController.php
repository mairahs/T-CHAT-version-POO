<?php
//ce fichier permet de déclencher toutes les actions à mener (traitement et affichage ) sur l'entité Salons:
	//affichage de tous les salons
	//L'affichage d'un salon
	//La création d'un salon
	//La suppression d'un salon
    // etc...
//Les actions à effectuer pour l'appel aux méthodes ci-dessous seront commandées grâce aux paramètres action dans l'url exemple: monsite.com?controller=salons&action=afficheall
//monsite.com/salons/afficheall pour la récriture d'url pour que ce soit plus joli pour le visiteur en modifiant le .htacess sur symfony c'est géré par le routeur

namespace Controller;

use Controller\Controller;

class SalonsController extends Controller
{
	public function afficheAll(){

		$salons = $this->getRepository() ->getAllSalon();
		//var_dump($salons);

		//Affichage de la vue qui correspond à) cette action

		$nbreSalons = count($salons);

		return $this ->render('layout.html','salons.html', array('title'=>'Accueil','nbreSalons'=>$nbreSalons,'salons'=>$salons)); // je peux meme charger dynamiquement un fichier css pour mon salon.html'css'=>"salons.css" par exemple ou alors avec des fichiers JS qui correspondent à cette vue bien précisément au lieu de mettre un fichier JS qui est chargé sur toutes les pages alors qu il n 'est utilisé que sur une page'
		//la fonction render() déclarée dans controller.php permet d'aller chercher le bon template, la bonne vue et de les afficher avec des variables à l'intérieur/
		//Elle attent 3 arguments:
		/*
			1 le template
			2 la vue
			3 les paramètres (array) // donc par exemple le $salons qui est l array qui me retourne tous mes salons de la bdd
		*/

			//Autre façon d'utiliser render() plus lisible peut être
			/*

				$param = array('title'=>'Accueil', 'nbreSalons'=>$nbreSalons, 'salons'=>$salons);
				return $this->render('layout.html', 'salons.html', $param);
			*/
	}

	public function affiche($id){

		//a cause du sesign, dans l'affichage d'un seul salon je dois récupérer les infos de tous les salons
		$salons = $this ->getRepository() ->getAllSalon();

		
		
		$salon = $this->getRepository() ->getSalonById($id);

		//créer un objet de MessagesController

		$mes = new MessagesController; //inutile de préciser le namespace controller puisque on est déjà dedans
		//je dois utiliser une fonction de Messages Controller qui me permettra de récupérer tous les messages

		$contenuSalon = $mes -> recupAll($salon ->getId());


		//var_dump($salon);
		//affichage de la vue qui correspnt à cette action

		$title = 'Salon : '. $salon -> getNom();

		$param = array(

					'salon' =>$salon,
					'title' =>$title,
					'salons'=>$salons,
					'contenuSalon'=>$contenuSalon);

		return $this->render('layout.html','salon.html', $param);
	}
}

