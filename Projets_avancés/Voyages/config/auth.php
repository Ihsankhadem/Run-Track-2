<?php
class Auth {
    private static $instance = null;
    private $connexion;
    private $id;
    private $nom;
    private $email;
    private $isConnected = false;

    // Singleton (une seule instance)
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Constructeur privé
    private function __construct() {
        $config = require __DIR__ . '/db.php';
        // Créer la chaîne de connexion DSN (Data Source Name) nécessaire à PDO pour se connecter à MySQL.
        // Crée une adresse complète de la base (type, serveur, base, encodage)
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        try {
        // Création d’un objet PDO (PHP Data Object) qui représente la connexion à la base.
        // Se connecte à cette base avec le bon utilisateur et mot de passe
        $this->connexion = new PDO($dsn, $config['user'], $config['password']);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // REGISTER
    public function register($nom, $email, $password) {
        if (empty($nom) || empty($email) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }

        $stmt = $this->connexion->prepare("SELECT id FROM users WHERE nom = ? OR email = ?");
        $stmt->execute([$nom, $email]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return "Ce nom d'utilisateur ou cet email existe déjà.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connexion->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $hashedPassword]);
        return true;
    }

    // LOGIN
    public function connect($nom, $password) {
        if (empty($nom) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }

        $stmt = $this->connexion->prepare("SELECT id, nom, email, password FROM users WHERE nom = ? OR email = ?");
        $stmt->execute([$nom, $nom]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->nom = $user['nom'];
            $this->email = $user['email'];
            $this->isConnected = true;
            return true;
        }

        return "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getEmail() { return $this->email; }
}
