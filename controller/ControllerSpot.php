<?php
require_once File::build_path(array("model","ModelSpot.php"));

class ControllerSpot {

	protected static $controller = "Spot";

	public static function readAll() {
		$tab_s = ModelSpot::getAllSpot();     //appel au modèle pour gerer la BD
		$controller='Spot';
		$view='list';
		$pagetitle='Liste des spots';
		require File::build_path(array("view","view.php"));  //"redirige" vers la vue
	}

	public static function read(){

		$s = ModelSpot::getSpotById($_GET["id_spot"]);

		if ($s)
		{
			$view='detail';
			$pagetitle='Details de spot';
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
		$pagetitle='Createur de spot';
		require File::build_path(array("view","view.php"));
	}


	public static function created(){

		$u = new ModelSpot($_GET["id_spot"], $_GET["nom"], $_GET["commune"]);
		if ($u->save()) {
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else {
			$view='created';
			$pagetitle='spot a été crée';
			$tab_s = ModelSpot::getAllSpot();
			require File::build_path(array("view","view.php"));
		}
	}

	public static function update(){

		$c = ModelSpot::getSpotById($_GET["id_spot"]);
		if(!$c) {
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else {
			$type_action = 'update';
			$view='update';
			$pagetitle='le compte rendu a été maj';
			$tab_c = ModelSpot::getAllSpot();

			$id_spot = $_GET["id_spot"];
			$nom = $c->getNom();
			$commune = $c->getCommune();
			require File::build_path(array("view","view.php"));
		}
	}

	public static function updated(){

		$u = ModelSpot::getSpotById($_GET["id_spot"]);
		if (!$u)
		{
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else
		{
			$data = array(
				"id_spot" => $_GET["id_spot"],
				"nom" => $_GET["nom"],
				"commune" => $_GET["commune"],
			);
			$u->update($data);
			$view='updated';
			$pagetitle='le spot a été maj';
			$id_spot = $_GET["id_spot"];
			$tab_s = ModelSpot::getAllSpot();
			require File::build_path(array("view","view.php"));
		}
	}

	public static function delete(){

		$u = ModelSpot::getSpotById($_GET["id_spot"]);

		if(!$u)
		{
			$view='error';
			$pagetitle='error';
			require File::build_path(array("view","view.php"));
		}
		else
		{
			ModelSpot::delete($u->getIdspot());
			$view='deleted';
			$pagetitle='le spot a été supprimé';
			$tab_s = ModelSpot::getAllSpot();
			$id_spot = $_GET["id_spot"];
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

