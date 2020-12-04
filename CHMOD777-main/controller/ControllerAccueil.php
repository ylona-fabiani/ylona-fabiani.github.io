<?php
class ControllerAccueil {
    protected static $controller = 'html';

    public static function readAll() {
        $pagetitle = "Accueil";
        $view = "accueil";
        require File::build_path(array('view', 'view.php'));
    }
}
?>
