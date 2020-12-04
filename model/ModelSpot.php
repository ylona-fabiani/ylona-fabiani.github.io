<?php

require_once File::build_path(array("model","Model.php"));

class ModelSpot
{
	private $id_spot;
	private $nom;
	private $commune;



	public function __construct($idspot = NULL, $nom = NULL, $commune = NULL) {
		if (!is_null($idspot) && !is_null($nom) && !is_null($commune)) {
			$this->id_spot = $idspot;
			$this->nom = $nom;
			$this->commune = $commune;
		}
	}

	public static function getAllSpot() {
		$rep = Model::$pdo->query("SELECT * FROM Spot");
		$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelSpot');
		$tab_spot = $rep->fetchAll();

		return $tab_spot;
	}

	public function afficher() {
		echo $this->id_spot;
	}

	public static function getSpotById($id) {
		$sql = "SELECT * from Spot WHERE id_spot=:nom_tag";
		// Préparation de la requête
		$req_prep = Model::$pdo->prepare($sql);

		$values = array(
			"nom_tag" => $id,
		);

		$req_prep->execute($values);

		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelSpot');
		$tab_s = $req_prep->fetchAll();
		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_s))
			return false;
		return $tab_s[0];
	}


	public function save(){

		$sql = "INSERT INTO Spot(id_spot, nom, commune) VALUES(:id_spot, :nom, :commune)";
		$req_prep = Model::$pdo->prepare($sql);


		$values = array(
			"id_spot" => $this->id_spot,
			"nom" => $this->nom,
			"commune" => $this->commune,
		);

		try
		{
			$req_prep->execute($values);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}
	}

	public static function delete($primary_value){

		$sql = " DELETE FROM Spot WHERE id_spot = :tag";
		$req_prep = Model::$pdo->prepare($sql);

		$values = array(
			"tag" => $primary_value,
		);

		try
		{
			$req_prep->execute($values);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}
	}

	public function update($data){

		$sql = " UPDATE Spot SET nom = :nom ,commune = :commune WHERE id_spot = :id_spot ";
		$req_prep = Model::$pdo->prepare($sql);

		try
		{
			$req_prep->execute($data);
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}
	}


	//////////////////////////: getter ://////////////////////////

	/**
	 * @return mixed
	 */
	public function getIdspot()
	{
		return $this->id_spot;
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @return mixed
	 */
	public function getCommune()
	{
		return $this->commune;
	}

}