
<?php

// config.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



// ds class pas $password 
//delete et update effacer
class moduleCNX {
    private static $instance = null;

    private $id;
    public $login;
    public $prenom;
    public $nom;
    private $connexion;
    private $isConnected = false;

    private function __construct() {
        try {
            $this->connexion = new PDO("mysql:host=localhost:3307;dbname=moduleconnexion", "root", "");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

// le site partage une seule instance = un seul "canal" vers MySQL
// Instance = un objet concret créé à partir d’une classe.
// getInstance() = garantit qu’il n’y a qu’une seule instance de moduleCNX dans tout ton site.
// C’est pour éviter d’avoir 50 connexions ouvertes à la base de données.
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new moduleCNX();
        }
        return self::$instance;
    }

// permet d’accéder à l’objet PDO pour lancer des requêtes SQL manuelles. 
    public function getConnexion() {
        return $this->connexion;
    }

    // register retourne true ou message d'erreur
    public function register($login, $password, $prenom, $nom) {
        if (empty($login) || empty($password) || empty($prenom) || empty($nom)) {
            return "Tous les champs sont obligatoires.";
        }

        // Vérifier si login existe déjà
        $stmt = $this->connexion->prepare("SELECT id FROM users WHERE login = ?");
        $stmt->execute([$login]);
        if ($stmt->fetch()) {
            return "Ce login est déjà utilisé.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $this->connexion->prepare("INSERT INTO users (login, password, prenom, nom) VALUES (?, ?, ?, ?)");
            $stmt->execute([$login, $hashedPassword, $prenom, $nom]);

            $this->login = $login;
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->isConnected = true;
            return true;
        } catch (PDOException $e) {
            error_log("Erreur SQL register: " . $e->getMessage());
            return "Erreur lors de l'inscription.";
        }
    }

    // connect retourne true/false
    public function connect($login, $password) {
        if (empty($login) || empty($password)) {
            return false;
        }

        $stmt = $this->connexion->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->prenom = $user['prenom'];
            $this->nom = $user['nom'];
            $this->isConnected = true;
            return true;
        }

        return false;
    }

    public function isConnected() {
        return $this->isConnected;
    }

// appel des fonction public
    public function getLogin() { return $this->login; }
    public function getPrenom() { return $this->prenom; }
    public function getNom() { return $this->nom; }
}
