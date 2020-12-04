<?php

require_once File::build_path(array("controller","ControllerCompteRendu.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerApropos.php"));
require_once File::build_path(array("controller", "ControllerContact.php"));
require_once File::build_path(array("controller", "ControllerSpot.php"));
require_once File::build_path(array("controller", "ControllerAccueil.php"));

// On recupere le controller passé dans l'URL

$controller_default = "Accueil";


if (isset($_GET['controller']))
{
	$controller = $_GET['controller'];
	$controller_class = "Controller" . ucfirst($controller);
}
else {
	$controller = $controller_default;
	$controller_class = "Controller" . ucfirst($controller);
}


// On recupère l'action passée dans l'URL
if (isset($_GET['action']))
{
	if (in_array($_GET['action'], get_class_methods($controller_class)))
	{
		$action = $_GET["action"];
	}
	else
	{
		$action = "error";
	}
}
else
{
	$action = "readAll";
}

// Appel de la méthode statique $action de ControllerVoiture
$controller_class::$action();
?>