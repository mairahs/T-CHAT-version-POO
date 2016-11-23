<?php 

namespace Controller;

use Controller\Controller;

class MessagesController extends Controller
{
	public function recupAll($id){

		$messages = $this  -> getRepository() -> getAllInfoMessage($id);
		return $messages;
	}

	public function messageRegister(){

		$message = $this -> getRepository() -> registerMessage();

		if($message){
			$succes = "Message de félicitations";
		}else{
			$succes ="Message d'erreur";
		}

		//return $this->render();
	}
}