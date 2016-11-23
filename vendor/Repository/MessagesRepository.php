<?php

namespace Repository;

use Manager\EntityRepository;

class MessagesRepository extends EntityRepository
{
	public function getAllMessage(){// mais elle ne me sert à rien mais Yakine la cree pour nous montrer les req génériques

		return $this ->findAll();


	}

	public function getAllInfoMessage($id){

		// cette fonction nous sert pour l'affichage d'un salon qui nécessite de récupérer les contenus des messages ainsi que les pseudos des utilisateurs (requete de jointure)

		$q = $this ->getDb() -> query("SELECT messages.*, utilisateurs.pseudo FROM messages JOIN utilisateurs ON messages.id_utilisateur = utilisateurs.id AND messages.id_salon=$id");

		$r = $q -> fetchAll();

		if(!$r){

			return FALSE;
		}else{
			return $r;
		}


	}
}

