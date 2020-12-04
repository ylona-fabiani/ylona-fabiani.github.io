<?php
require_once File::build_path(array("model","ModelCompteRendu.php"));

class ControllerCompteRendu {

	protected static $controller = "CompteRendu";

	public static function readAll() {
		$tab_c = ModelCompteRendu::getAllCompteRendu();     //appel au modèle pour gerer la BD
		$controller='CompteRendu';
		$view='list';
		$pagetitle='Liste des compte rendu';
		require File::build_path(array("view","view.php"));  //"redirige" vers la vue
	}

	public static function read(){

		$c = ModelCompteRendu::getCompteRenduById($_GET["id_compteRendu"]);

		if ($c)
		{
			$view='detail';
			$pagetitle='Details de compte rendu';
			require File::build_path(array("view","view.php"));  //"redirige" vers la vue sans erreur
		}
		else
		{
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));  //"redirige" vers la vue avec erreur
		}
	}

	public static function create(){

		$type_action = 'create';
		$view='create';
		$pagetitle='Createur de compte rendu';
		require File::build_path(array("view","view.php"));
	}


	public static function created(){

		$u = new ModelCompteRendu($_GET["id_compteRendu"], $_GET["id_spot"], $_GET["login"], $_GET["date_"], $_GET["duree_sessions"], $_GET["houle"], $_GET["meteo"], $_GET["pollution"], $_GET["txt_descriptif"]);
		if ($u->save()) {
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else {
			$view='created';
			$pagetitle='compte rendu a été crée';
			$tab_c = ModelCompteRendu::getAllCompteRendu();
			require File::build_path(array("view","view.php"));
		}
	}

	public static function update(){

		$c = ModelCompteRendu::getCompteRenduById($_GET["id_compteRendu"]);
		if(!$c) {
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else {
			$type_action = 'update';
			$view='update';
			$pagetitle='le compte rendu a été maj';
			$tab_c = ModelCompteRendu::getAllCompteRendu();

			$id_compteRendu = $_GET["id_compteRendu"];
			$id_spot = $c->getIdSpot();
			$login = $c->getLogin();
			$date_ = $c->getDate();
			$duree_sessions = $c->getDureeSessions();
			$houle = $c->getHoule();
			$meteo = $c->getMeteo();
			$pollution = $c->getPollution();
			$txt_descriptif = $c->getTxtDescriptif();
			require File::build_path(array("view","view.php"));
		}
	}

	public static function updated(){

		$u = ModelCompteRendu::getCompteRenduById($_GET["id_compteRendu"]);
		if (!$u)
		{
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else
		{
			$data = array(
				"id_compteRendu" => $_GET["id_compteRendu"],
				"id_spot" => $_GET["id_spot"],
				"login" => $_GET["login"],
				"date_" => $_GET["date_"],
				"duree_sessions" => $_GET["duree_sessions"],
				"houle" => $_GET["houle"],
				"meteo" => $_GET["meteo"],
				"pollution" => $_GET["pollution"],
				"txt_descriptif" => $_GET["txt_descriptif"],
			);
			$u->update($data);
			$view='updated';
			$pagetitle='le compte rendu a été maj';
			$id_compteRendu = $_GET["id_compteRendu"];
			$tab_c = ModelCompteRendu::getAllCompteRendu();
			require File::build_path(array("view","view.php"));
		}
	}

	public static function delete(){

		$u = ModelCompteRendu::getCompteRenduById($_GET["id_compteRendu"]);

		if(!$u)
		{
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else
		{
			ModelCompteRendu::delete($u->getIdCompteRendu());
			$view='deleted';
			$pagetitle='l\'utilisateur a été supprimé';
			$tab_c = ModelCompteRendu::getAllCompteRendu();
			$id_compteRendu = $_GET["id_compteRendu"];
			require File::build_path(array("view","view.php"));
		}
	}

	public static function error(){
		$view='error';
		$pagetitle='error';
		require File::build_path(array("view","view.php"));
	}

}
?>

