<?php
//Ce fichier est le controleur général de notre application. Il permet d'appeler des repository en fonction du controlleur qui l'utilise (c a d salons controlleur ou utilisateurscontroleur ou messCont)Il contient également la fonction render() qui permet d'afficher les bonnes vues et le bon template

//Ce fichier est le controleur général de l'application. Il permet d'appeler des repository en fonction du contoller qui l'utilise (SalonsController, ou UtilisateursController, ou MessagesController).
// Il contient également la fonction render() qui permet d'afficher les bonnes vues et le bon template. 

namespace Controller; 

class Controller
{
	protected $model;
	
	public function getRepository(){
		// Cette fonction va permettre d'instancier le bon repository en fonction du controller dans lequel je me trouve. 
		
		$class = 'Repository\\' . str_replace(array('Controller\\', 'Controller'), '', get_called_class()) . 'Repository';
		
		//Je prend le nom de la classe par exemple Controller\SalonsController et je le transforme en Repository\SalonsRepository.
		//$class contient : Repository\SalonsRepository
		
		if(is_null($this -> model)){
			$this -> model = new $class;
		}
		return $this -> model;
		
	}
	
	public function render($layout, $template, $parameters = array()) // cette fonction render est générique à tous les frameworks et me permet d aller chercher la bonne vue
    {
        $dirViews = __DIR__ . '/../../src/Views'; // dirViews va être le chemin vers le dossier ou se trouvent mes vues donc src/Views/Salons/
        //je récupère le nom de la classe dans laquelle est utilisée render() donc Controller\SalonsController =
        //remplacement de \ par / ce qui fait Controller/SalonsController
        // ensuite vendor/Controller/../../src/Views/
		
        $ex = explode('\\', get_called_class()); //en fonction de la classe que j'ut(Controller\SalonsController) je vais aller dans 		
		
        $dirFile = str_replace('Controller', '', $ex[1]);// je retire le mot controleur de mon tableau à l'indice 1 et je le remplace par rien du tout donc $dirFile = Salons;

        $__template__ = $dirViews . '/' . $dirFile . '/' . $template; 

        //$__template__ = vendor/Controller/../../src/Views/Salons/salons.html;
        $__layout__ = $dirViews . '/' . $layout; 

        //$__layout__ = vendor/Controller/../../src/views/layout.html

        //echo $__template__.'<br/>';// c bon le chemin est bien récupéré
        //echo $__layout__.'<br/>';// c bon le chemin est bien récupéré
		
        extract($parameters, EXTR_SKIP); // la fonction extract() qui prend en paramètre un tableau prend le nom de l'indice avec à l'intérieur la valeur empeche que l'on fasse $liste['fruit1'] et que l'on fasse plustot $fuit1 qui nous retourne la valeur donc ça simplifie l'écriture le 2e param, EXTR_SKIP est facultatif si il trouve une variable déjà existante avec ce nom là, il ne l'extracte pas donc elle n'existera pas sous le nom $fruit1. Cette fonction est donc très pratique car elle crée des variables depuis un array en utilisant l'indice comme nom de variable et la valeur comme valeur donc met mon salons.html en mémoire tampon et ne le fais pas tout de suite
		
        ob_start(); // ob_start() enclenche la temporisation de sortie, c'est à dire que ce qui suit ne se produit pas tout de suite. Nous retenons donc l'affichage de $__template__
		require $__template__; 
        $content = ob_get_clean();//ob_get_clean va utiliser $content pour représenter ce qui vient d'être mis en mémoire tampon donc $content contient le fichier de la vue (cad salons.html)

		// extract($parameters, EXTR_SKIP);
        ob_start(); //
		require $__layout__; 
		
        return ob_end_flush();  // lui va m'envoyer le contenu en mémoire tampon et termine la temporisation donc qu il avait retenu, il ne l a plus en mémoire
    }
}


