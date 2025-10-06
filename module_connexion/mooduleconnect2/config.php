
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class moduleconnect {
    private static $instance = null;
    private $id;
    public $username;
    public  $email;
    private $isConnected = false;
    private $connexion;


    private function __construct(){
        try{
            $this->connexion = new PDO('mysql:host=localhost:3307;dbname=moduleconnect', 'root', '');
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données: " . $e->getMessage());
            die("Erreur de connexion à la base de données.");
        }
    }

    public static function getInstance() {
        if (self::$instance === null){
            self::$instance = new moduleconnect();
        }
        return self::$instance;
    }


    public function getConnexion() {
        return $this->connexion;
    }

    public function register($username, $email, $password) {
        if (empty($username) || empty($email) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }
        $stmt = $this->connexion->prepare("SELECT id FROM moduleconnect WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return "Ce nom d'utilisateur ou email est déjà utilisé.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $this->connexion->prepare("INSERT INTO moduleconnect (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            $this->username = $username;
            $this->email = $email;
            $this->isConnected = true;
            return true;
        } catch (PDOException $e) {
            error_log("Erreur SQL register: " . $e->getMessage());
            return "Erreur lors de l'inscription. Veuillez réessayer plus tard.";
        }
    }

    public function isConnected() {
        return $this->isConnected;
    }

    public function connect($username, $password) {
        if (empty($username) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }
        $stmt = $this->connexion->prepare("SELECT id, username, email, password FROM moduleconnect WHERE username = ? OR email = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->isConnected = true;
            return true;
        } else {
            return "Nom d'utilisateur/email ou mot de passe incorrect.";
        }
    }

    public function updateUser($currentUsername, $newUsername, $newEmail, $newPassword = null) {
        if (empty($newUsername) || empty($newEmail)) {
            return "Le nom d'utilisateur et l'email sont obligatoires.";
        }

        $stmt = $this->connexion->prepare("SELECT id FROM moduleconnect WHERE (username = ? OR email = ?) AND username != ?");
        $stmt->execute([$newUsername, $newEmail, $currentUsername]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return "Ce nom d'utilisateur ou email est déjà utilisé.";
        }

        try {
            if ($newPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $this->connexion->prepare("UPDATE moduleconnect SET username = ?, email = ?, password = ? WHERE username = ?");
                $stmt->execute([$newUsername, $newEmail, $hashedPassword, $currentUsername]);
            } else {
                $stmt = $this->connexion->prepare("UPDATE moduleconnect SET username = ?, email = ? WHERE username = ?");
                $stmt->execute([$newUsername, $newEmail, $currentUsername]);
            }

            // Mise à jour de la session avc les nouvelles valeurs
            $_SESSION['user']['username'] = $newUsername;
            $_SESSION['user']['email'] = $newEmail;

            return true;
        } catch (PDOException $e) {
            error_log("Erreur lors de la mise à jour: " . $e->getMessage());
            return "Erreur lors de la mise à jour. Veuillez réessayer plus tard.";
        }
    }

    public function getUsername() {
        return $this->username;
    }
    public function getEmail() {
        return $this->email;
    }



}