<?php

namespace Entity;

class Salons
{
	protected $id, $nom;


	/**
	 * GETTER
	*/

	public function getId(){
		return $this->id;
	}

	public function getNom(){
		return $this->nom;
	}

	/**
	 * SETTER
	*/

	public function SetId($id){
		return $this->id = $id;
	}

	public function SetNom($nom){
		return $this->nom = $nom;
	}


}

// Dans notre cas, nous ne faisons pas de vérification de données mais bien entendu, dans un cas réel, nous devrions le faire et créer une classe Erreur par exemple que nous instancierons à chaque fois qu'il y a une erreur


