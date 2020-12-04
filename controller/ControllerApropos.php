<?php

class ControllerApropos {
    protected static $controller = 'html';

    public static function readAll() {
        $pagetitle = "A propos";
        $view = "apropos";
        require File::build_path(array('view', 'view.php'));
    }
}

?>
