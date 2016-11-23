<?php

namespace Repository;

use Manager\EntityRepository; //je demande à pouvoir utiliser la classe EntityRepository qui se trouve dans le namaspace Manager

class SalonsRepository extends EntityRepository
{
	public function getAllSalon(){
		return $this->findAll();
	}

	public function getSalonById($id){
		return $this->find($id);
	}

	public function registerSalon(){
		return $this->register();
	}

	//si j'avais des besoins plus spécifiques en terme de requêtes SQL, je déclarerai des nouvelles fonctions ici contenant des requetes plus complexes comme des jointures per exemple les functions ci dessus sont en fait les fonctions déclarées dans entity repository et dont salon message et utilisateur vont hériter
}