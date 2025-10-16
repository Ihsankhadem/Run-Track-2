<?php
// config.php

class livreor {

    private static $instance = null;
    private $connexion;
    private $id;
    private $login;
    private $email;
    private $comment;
    private $isConnected = false;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new livreor();
        }
        return self::$instance;
    }

    public function __construct() {
        try {
            $this->connexion = new PDO('mysql:host=localhost:3307;dbname=livre_or', 'root', '');
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { 
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getConnexion() {
        return $this->connexion;
    }

    public function isConnected() {
        return $this->isConnected;
    }
// apres connexion, on recharge les infos de l'utilisateur dans l'objet 
    public function setConnectedUser($id, $login, $email) {
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->isConnected = true;
    }

    public function getId() {
        return $this->id;
    }
    public function getLogin() {
        return $this->login;
    }
    public function getEmail() {
        return $this->email;
    }

    // ===============================
    //   INSCRIPTION
    // ===============================
    public function register($login, $email, $password) {
        if (empty($login) || empty($email) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }

        $stmt = $this->connexion->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
        $stmt->execute([$login, $email]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return "Ce nom d'utilisateur ou cet email existe déjà.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connexion->prepare("INSERT INTO users (login, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$login, $email, $hashedPassword]);
        return true;
    }

    // ===============================
    //   CONNEXION
    // ===============================
    public function connect($login, $password) {
        if (empty($login) || empty($password)) {
            return "Tous les champs sont obligatoires.";
        }
// ne fait pas la différence entre login et email pour la connexion donc on cherche les deux = 2 fois login
// ds login on peut mettre soit le login soit l'email
        try {
            $stmt = $this->connexion->prepare("SELECT id, login, email, password FROM users WHERE login = ? OR email = ?");
            $stmt->execute([$login, $login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $this->id = $user['id'];
                $this->login = $user['login'];
                $this->email = $user['email'];
                $this->isConnected = true;
                return true;
            } else {
                return "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            error_log("Erreur SQL connect: " . $e->getMessage());
            return "Erreur lors de la connexion à la base de données.";
        }
    }

    // ===============================
    //  AJOUT DE COMMENTAIRE
    // ===============================
    public function addComment($id_user, $comment) {
        if (!$this->isConnected) {
            return "Vous devez être connecté pour ajouter un commentaire.";
        }
        if (empty($comment)) {
            return "Le commentaire ne peut pas être vide.";
        }

        try {
            $stmt = $this->connexion->prepare("INSERT INTO commentaires (id_user, comment, date) VALUES (?, ?, NOW())");
            $stmt->execute([$id_user, $comment]);
            return true;
        } catch (PDOException $e) {
            return "Erreur lors de l'ajout du commentaire.";
        }
    }

// La méthode $stmt->fetchAll(PDO::FETCH_ASSOC) est utilisée pour récupérer tous 
// les résultats d'une requête SQL sous forme de tableau associatif.

// fetch() : récupère une seule ligne du résultat.
// fetchAll() : récupère toutes les lignes en une seule fois.


    // ===============================
    //  RÉCUPÉRER TOUS LES COMMENTAIRES
    // ===============================
    public function getAllComments() {
        try {
            $stmt = $this->connexion->prepare("
                SELECT c.comment, u.login, c.date 
                FROM commentaires c
                JOIN users u ON c.id_user = u.id
                ORDER BY c.date DESC
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur SQL getAllComments: " . $e->getMessage());
            return [];
        }
    }

    // ===============================
    //  MODIFICATION DU PROFIL
    // ===============================
    public function updateUser($oldLogin, $newLogin, $newEmail, $newPassword = '') {
        try {
            // Vérifie que l'email ou le login ne sont pas déjà utilisés par quelqu’un d’autre
            $stmt = $this->connexion->prepare("SELECT id FROM users WHERE (login = :login OR email = :email) AND login != :oldLogin");
            $stmt->execute([
                ':login' => $newLogin,
                ':email' => $newEmail,
                ':oldLogin' => $oldLogin
            ]);
            if ($stmt->fetch()) {
                return "Ce nom d'utilisateur ou cet email est déjà pris.";
            }

            // Met à jour selon si un mot de passe a été saisi ou non
            if (!empty($newPassword)) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                // Met à jour login, email et password
                $sql = "UPDATE users 
                        SET login = :newLogin, email = :newEmail, password = :newPassword 
                        WHERE login = :oldLogin";
                $stmt = $this->connexion->prepare($sql);
                $stmt->execute([
                    ':newLogin' => $newLogin,
                    ':newEmail' => $newEmail,
                    ':newPassword' => $hashedPassword,
                    ':oldLogin' => $oldLogin
                ]);
            } else {
                // Met à jour seulement login et email
                $sql = "UPDATE users 
                        SET login = :newLogin, email = :newEmail 
                        WHERE login = :oldLogin";
                $stmt = $this->connexion->prepare($sql);
                $stmt->execute([
                    ':newLogin' => $newLogin,
                    ':newEmail' => $newEmail,
                    ':oldLogin' => $oldLogin
                ]);
            }
//  Met à jour les infos dans l'objet courant si la mise à jour a réussi
//  (rowCount() > 0 signifie qu'une ligne a été modifiée)
// on ne met à jour que si une ligne a été modifiée
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return "Aucune modification effectuée.";
            }
        } catch (PDOException $e) {
            return "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
}
