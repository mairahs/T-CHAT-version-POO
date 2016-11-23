<?php

namespace Manager;

final class Application //on ne peut pas en hériter ce sera donc le dernier ojet qui sera créé
{
	protected $controller;
	protected $action;
	protected $id;
	
	public function __construct(){
		if(isset($_GET['controller']) && $_GET['controller'] !=''){
			$this -> controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller'; // donc nom complet du controlleur qui va devoir être lancé
		}
		else{
			$this -> controller = 'Controller\SalonsController';
		}
		
		if(isset($_GET['action']) && $_GET['action'] !=''){
			$this -> action = $_GET['action']; //this action est egal à la valeur de ce que j'ai trouvé dans l'url action
		}
		else{

			$this -> controller = 'Controller\SalonsController';
			$this -> action = 'AfficheAll';
		}
		
		if(isset($_GET['id']) && $_GET['id'] !=''){// je caste l'id donc si je n'ai pas d'integer transforme le moi en integer
			$this -> id = (int) $_GET['id'];
		}
	}
	
	public function lancement(){
		if(!is_null($this -> controller)){
			$a = new $this -> controller;
			if(!is_null($this -> action))
			{
				if(is_null($this -> id)){
					$action =  $this -> action;
					$a -> $action();
				}
				else{
					$action =  $this -> action;
					$a -> $action($this -> id);
				}
			}
		}
	}	
} 