<?php

namespace Entity;

class Messages
{
	protected $id, $corps, $image, $date_creation, $date_modification, $id_utilisateur, $id_salon;


	/**
	 * GETTER
	*/

	public function getId(){
		return $this->id;
	}

	public function getCorps(){
		return $this->corps;
	}

	public function getImage(){
		return $this->image;
	}

	public function getDate_creation(){
		return $this->date_creation;
	}

		public function getDate_modification(){
			return $this->date_modification;
	}

		public function getId_utilisateur(){
			return $this->id_utilisateur;
	}

		public function getId_salon(){
			return $this->id_salon;
	}



	/**
	 * SETTER
	*/

	public function SetId($id){
		return $this->id = $id;
	}

	public function SetCorps($corps){
		return $this->corps = $corps;
	}

	public function SetImage($image){
		return $this->image = $image;
	}

	public function SetDate_creation($date_creation){
		return $this->date_creation = $date_creation;
	}

	public function SetDate_modification($date_modification){
		return $this->date_modification = $date_modification;
	}

	public function SetId_utilisateur($id_utilisateur){
		return $this->id_utilisateur = $id_utilisateur;
	}

	public function SetId_salon($id_salon){
		return $this->id_salon = $id_salon;
	}




}
