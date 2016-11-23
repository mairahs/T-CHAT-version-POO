<?php

//Un repository centralise tout ce qui touche à la récupérations des informations dans la BDD. En d'autres termes il ne doit pas y avoir de requetes SQL ailleurs que dans un Repository (Model)
//EntityRepository ne connait pas Salons, Messages, Utilisateurs, donc cela doit rester générique

namespace Manager;

use Manager\PDOManager;
use PDO; //grace à ce use, je peux utiliser PDO sans faire \PDO

class EntityRepository
{
	private $db;
	public function getDb(){
		if(is_null($this->db)){
			$this->db = PDOManager::getInstance()->getPdo();
		}
		return $this->db;
	}

	private function getTableName(){

		//les requêtes ci dessous sont génériques et s'adaptent à la classe qui les exécute. Il faut donc que je récupère le nom de l'entité grace au nom de la classe qui les exécute

		return strtolower(str_replace(array('Repository\\','Repository'),'',get_called_class()));//salonsrepository messagerepository ect... seront dans le namespace repository et vont hériter de entityrepository donc il me retournera salon si c'est salon repository qui a utilisé la fonction car on veut que les req sql s adaptent à la table et que la table soit définie dynamiquement getcalledclass récupère le nom de la classe concernée elle récupère la classe dans laquelle on est qd on execute la fonction par exemple elle me renvoit repository utilisateur repository si je suis dans utiillsateur

		//DONC la ligne ci-dessus transforme le nom complet de la classe pour en retenir simplement le nom de l'entité:
		//Repository\SalonsRepository = Salons = salons
		
	}

	//REQUETES SQL P(FONCTIONS GENERALES)

	public function find($id){// fonction pour aller chercher toutes les infos d'un enregistrement via son id

		$q = $this ->getDb() -> prepare("SELECT * FROM ".$this->getTableName(). " WHERE id = :id");
		$q ->bindParam(':id',$id, PDO::PARAM_INT);
		$q->execute();

		$q -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.$this->getTableName());
		//SetFetchMode est très pratique... ça permet d'instancier la classe passée en argument (Entity\Salons, ou Entity\Messages ou Entity\Utlisateurs) selon le repository qui utilise cette méthode et ça permet de mettre les valeurs trouvées dans la bdd dans les propriétés de l'objet Entity
		//donc $salon = new  Entity\salons
		//$salon ->setId('valeur dans la bdd pour cet enregistrement pour la valeur id'); par exemple donc je récupère donc un objet $salon ->getId(); IL LE FAIT TOUT SEUL POUR NOUS il cree l obljet et met à l'interieur les valeurs qu il a trouvé dans la bdd automatiquement ensuite on pourra par exemple l'utiliser dans nos vues...

		$r = $q->fetch();
		if(!$r){
			return false;
		}else{
			return $r;
		}

	}


	public function findAll(){// fonction pour aller chercher toutes les infos d'une table

		$q = $this ->getDb() -> query("SELECT * FROM ".$this->getTableName());
		$q -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.$this->getTableName());
		$r = $q->fetchAll();//on récupera des objets
		if(!$r){
			return false;
		}else{
			return $r;
		}

	}

	
		public function register(){//cette fonction permet d'enregistrer en BDD

		$requete = "INSERT INTO" . $this->getTableName."(". implode(",",array_keys($_POST)).") VALUES ('".implode("','",$_POST)."')";
		$q = $this-> getDb() ->query($requete);
		return $this->getDb()->lastInsertId();

		

	}
	
}