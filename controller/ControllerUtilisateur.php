<?php
require_once File::build_path(array('model', 'ModelUtilisateur.php'));

class ControllerUtilisateur {
    protected static $controller = 'utilisateur';

    public static function readAll() {
        $tab_u = ModelUtilisateur::getAllUtilisateur();
        $pagetitle = "Liste des utilisateurs";
        $view = 'list';
        require File::build_path(array('view', 'view.php'));
    }

    public static function error() {
        $pagetitle = "Erreur user";
        $view = "error";
        require File::build_path(array('view', 'view.php'));
    }

    public static function read() {
        $user = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);    // Récupère l'utilisateur

        if(!$user) {    // S'il n'existe pas
            ControllerUtilisateur::error();
        }
        else {
            $pagetitle = "Détails";
            $view = "details";
            require File::build_path(array('view', 'view.php'));
        }
    }


    public static function update() {
        $form_option = 'updated';
        $login_option = 'readonly';
        $u = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);
        $view = 'update';
        $pagetitle = 'Modifier un utilisateur';
        require File::build_path(array('view', 'view.php'));
    }

    public static function updated() {

        if($_GET['mdp'] != $_GET['mdpconf']) {
            $user = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);
            $view = 'update';
            $pagetitle = 'Modifier un utilisateur';
            $form_option = 'updated';
            $login_option = 'readonly';
            require File::build_path(array('view', 'view.php'));
        }
        else {
            $u = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);
            if($u->update($_GET)) {
                ControllerUtilisateur::error();
            }
            else {
                $view = 'updated';
                $pagetitle = 'Utilisateur modifié';
                $tab_u = ModelUtilisateur::getAllUtilisateur();
                require File::build_path(array('view', 'view.php'));
            }
        }
    }

    public static function delete() {
        $user = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);

        if(!$user) {
            ControllerUtilisateur::error();
        }
        else {
            ModelUtilisateur::delete($user->getLogin());
            ControllerUtilisateur::deconnect();
        }
    }

    public static function create() {
        $form_option = 'created';
        $login_option = 'required';
        $u = new ModelUtilisateur();
        $view = 'update';
        $pagetitle = 'Créer un utilisateur';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created() {
        if($_GET['mdp'] != $_GET['mdpconf']) {
            $user = new ModelUtilisateur();
            $view = 'update';
            $pagetitle = 'Modifier un utilisateur';
            $form_option = 'created';
            $login_option = 'required';
            require File::build_path(array('view', 'view.php'));
        }
        else {
            $user = new ModelUtilisateur($_GET['login'], $_GET['nom'], $_GET['prenom'], $_GET['adresse'], $_GET['mail'], $_GET['tel'], $_GET['mdp']);
            if($user->save()) {
                ControllerUtilisateur::error();
            }
            else {
                $_SESSION['login'] = $user->getLogin();
                $view = 'created';
                $pagetitle = 'Utilisateur Créé';
                require File::build_path(array('view', 'view.php'));
            }
        }
    }

    public static function connect() {
        $view = 'connect';
        $pagetitle = 'connexion';
        require File::build_path(array('view', 'view.php'));
    }

    public static function connected() {
        if(ModelUtilisateur::checkMdp($_GET['login'], Security::hacher($_GET['mdp']))) {
            $_SESSION['login'] = $_GET['login'];
            $view = 'connected';
            $pagetitle = 'Profil';
            $user = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);
            require File::build_path(array('view', 'view.php'));
        }
        else {
            ControllerUtilisateur::error();
        }
    }

    public static function deconnect() {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 1);
        $view = 'connect';
        $pagetitle = 'connexion';
        require File::build_path(array('view', 'view.php'));
    }

}
?>