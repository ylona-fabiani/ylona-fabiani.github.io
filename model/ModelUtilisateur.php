<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelUtilisateur {

    private $login;
    private $nom;
    private $prenom;
    private $adresse;
    private $mail;
    private $tel;
    private $mdp;

    /**
     * ModelUtilisateur constructor.
     * @param $login
     * @param $nom
     * @param $prenom
     * @param $adresse
     * @param $mail
     * @param $tel
     * @param $mdp
     *
     * Null de base pour constructeur sans paramètre
     */

    public function __construct($login = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $mail = NULL, $tel = NULL, $mdp = NULL)
    {
        if(!is_null($login) && !is_null($nom) && !is_null($prenom) && !is_null($adresse) && !is_null($mail) && !is_null($tel) && !is_null($tel))
        {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->mail = $mail;
            $this->tel = $tel;
            $this->mdp = $mdp;
        }
    }

    ////////////////////////// GETTER /////////////////////////////

    public function getLogin() {  return $this->login;  }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getAdresse() { return $this->adresse; }
    public function getMail() { return $this->mail; }
    public function getTel() { return $this->tel; }
    public function getMdp() { return $this->mdp; }

    ///////////////////////////////////////////////////////////////

    public function afficher() {
        echo " $this->login \n $this->nom \n $this->prenom \n $this->adresse \n $this->mail \n $this->tel";
    }

    public static function getUtilisateurByLogin($login) {
        /**
         * @action: Récupère l'utilisateur par son login
         * @param: $login, login de l'utilisateur
         */

        $sql = "SELECT * FROM Utilisateur WHERE login = :l";
        $req_prep = Model::$pdo->prepare($sql); // Prépare la requête pour éviter les injections SQL
        $values = array('l' => $login);     // Remplace le :l dans la requête par le $login
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $tab_user = $req_prep->fetchAll();  // Récupère le résultat de la requête sous forme de tableau

        if(empty($tab_user)) {  // Si vide
            return false;
        }
        return $tab_user[0];
    }

    public static function getAllUtilisateur() {
        /**
         * @action: Récupère tous les utilisateurs de la BD
         */

        $req = Model::$pdo->query("SELECT * FROM Utilisateur");
        $req->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $tab_user = $req->fetchAll();

        return $tab_user;
    }

    public static function delete($login) {
        /**
         * @action: Supprime l'utilisateur donné par son login
         * @param: $login, login de l'utilisateur
         */

        $sql = "DELETE FROM Utilisateur WHERE login = :l";
        $value = array('l' => $login);

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($value);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update($data) {
        /**
         * @action: Mets à jour l'utilisateur avec les données passées en paramètres
         * @param: $data, données pour maj de l'utilisateur
         */
        $sql = "UPDATE Utilisateur SET nom=:n, prenom=:p, adresse=:a, mail=:m, tel=:t, mdp=:mdp WHERE login=:l";

        $values = array(
            'n' => $data['nom'],
            'p' => $data['prenom'],
            'a' => $data['adresse'],
            'm' => $data['mail'],
            't' => $data['tel'],
            'mdp' => Security::hacher($data['mdp']),    // Hachage du mdp pour sécurité
            'l' => $data['login'],
        );

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function save() {
        /**
         * @action: Enregistre l'utilisateur dans la BD
         */

        $sql = "INSERT INTO Utilisateur(login, nom, prenom, adresse, mail, tel, mdp) VALUES (:l,:n,:p,:a,:m,:t,:mdp)";

        $values = array(
            'l' => $this->login,
            'n' => $this->nom,
            'p' => $this->prenom,
            'a' => $this->adresse,
            'm' => $this->mail,
            't' => $this->tel,
            'mdp' => Security::hacher($this->mdp),
        );

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($values);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public static function checkMdp($login, $mdp) {
        $sql = "SELECT * FROM Utilisateur WHERE login = :l AND mdp = :m";

        $value = array('l' => $login, 'm' => $mdp);

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($value);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $tab_u = $req_prep->fetchAll();

            return (empty($tab_u)) ? false : true;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }




}
?>