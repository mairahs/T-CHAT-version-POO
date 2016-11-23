<?php

namespace Entity;

class Utilisateurs
{
	protected $id, $pseudo, $mot_de_passe, $email, $avatar, $sexe;


	/**
	 * GETTER
	*/

	public function getId(){
		return $this->id;
	}

	public function getPseudo(){
		return $this->pseudo;
	}

	public function getMot_de_passe(){
		return $this->mot_de_passe;
	}

	public function getEmail(){
		return $this->email;
	}

		public function getAvatar(){
			return $this->avatar;
	}

		public function getSexe(){
			return $this->sexe;
	}

	

	/**
	 * SETTER
	*/

	public function SetId($id){
		return $this->id = $id;
	}

	public function Setpseudo($pseudo){
		return $this->pseudo = $pseudo;
	}

	public function SetMot_de_passe($mot_de_passe){
		return $this->mot_de_passe = $mot_de_passe;
	}

	public function SetEmail($email){
		return $this->email = $email;
	}

	public function SetAvatar($avatar){
		return $this->avatar = $avatar;
	}

	public function SetSexe($sexe){
		return $this->sexe = $sexe;
	}

	



}
