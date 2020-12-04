<?php

require_once File::build_path(array("model","Model.php"));

class ModelCompteRendu
{
	private $id_compteRendu;
	private $id_spot;
	private $login;
	private $date_;
	private $duree_sessions;
	private $houle;
	private $meteo;
	private $pollution;
	private $txt_descriptif;


	public function __construct($id_compteRendu = NULL, $id_spot = NULL, $login = NULL, $date_ = NULL, $duree_sessions = NULL, $houle = NULL, $meteo = NULL, $pollution = NULL, $txt_descriptif = NULL) {
		if (!is_null($id_compteRendu) && !is_null($id_spot) && !is_null($login) && !is_null($date_) && !is_null($duree_sessions) && !is_null($houle) && !is_null($meteo) && !is_null($pollution) && !is_null($txt_descriptif)) {
			$this->id_compteRendu = $id_compteRendu;
			$this->id_spot = $id_spot;
			$this->login = $login;
			$this->date_ = $date_;
			$this->duree_sessions = $duree_sessions;
			$this->houle = $houle;
			$this->meteo = $meteo;
			$this->pollution = $pollution;
			$this->txt_descriptif = $txt_descriptif;
		}
	}

	public static function getAllCompteRendu() {
		$rep = Model::$pdo->query("SELECT * FROM CompteRendu");
		$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCompteRendu');
		$tab_compteRendu = $rep->fetchAll();

		return $tab_compteRendu;
	}

	public function afficher() {
		echo $this->id_compteRendu;
	}

	public static function getCompteRenduById($id) {
		$sql = "SELECT * from CompteRendu WHERE id_compteRendu=:nom_tag";
		// Préparation de la requête
		$req_prep = Model::$pdo->prepare($sql);

		$values = array(
			"nom_tag" => $id,
		);

		$req_prep->execute($values);

		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCompteRendu');
		$tab_c = $req_prep->fetchAll();
		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_c))
			return false;
		return $tab_c[0];
	}


	public function save(){

		$sql = "INSERT INTO CompteRendu(id_compteRendu, id_spot, login, date_, duree_session, houle, meteo, pollution, txt_descriptif) VALUES(:id_compteRendu, :id_spot, :login, :date_, :duree_sessions, :houle, :meteo, :pollution, :txt_descriptif)";
		$req_prep = Model::$pdo->prepare($sql);


		$values = array(
			"id_compteRendu" => $this->id_compteRendu,
			"id_spot" => $this->id_spot,
			"login" => $this->login,
			"date_" => $this->date_,
			"duree_sessions" => $this->duree_sessions,
			"houle" => $this->houle,
			"meteo" => $this->meteo,
			"pollution" => $this->pollution,
			"txt_descriptif" => $this->txt_descriptif,
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

		$sql = " DELETE FROM CompteRendu WHERE id_compteRendu = :tag";
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

		$sql = " UPDATE CompteRendu SET id_spot = :id_spot ,login = :login ,date_ = :date_ ,duree_session = :duree_sessions ,houle = :houle ,meteo = :meteo ,pollution = :pollution ,txt_descriptif = :txt_descriptif WHERE id_compteRendu = :id_compteRendu ";
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
	public function getIdCompteRendu()
	{
		return $this->id_compteRendu;
	}

	/**
	 * @return mixed
	 */
	public function getIdSpot()
	{
		return $this->id_spot;
	}

	/**
	 * @return mixed
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * @return mixed
	 */
	public function getDate()
	{
		return $this->date_;
	}

	/**
	 * @return mixed
	 */
	public function getDureeSessions()
	{
		return $this->duree_sessions;
	}

	/**
	 * @return mixed
	 */
	public function getHoule()
	{
		return $this->houle;
	}

	/**
	 * @return mixed
	 */
	public function getMeteo()
	{
		return $this->meteo;
	}

	/**
	 * @return mixed
	 */
	public function getPollution()
	{
		return $this->pollution;
	}

	/**
	 * @return mixed
	 */
	public function getTxtDescriptif()
	{
		return $this->txt_descriptif;
	}

}