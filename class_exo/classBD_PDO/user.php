
<?php

class User{
     
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    private $isConnected = false;
    private $connexion;

// Connexion a la BDD

// Pour activer le mode debogage car il interrompt l'exécution du script à l'endroit où l'erreur se produit, 
// permettant une identification rapide du problème. , il est nécessaire d'utiliser la méthode setAttribute() sur 
// l'objet PDO après sa création, en spécifiant PDO::ATTR_ERRMODE comme attribut et PDO::ERRMODE_EXCEPTION comme valeu

// PDO::__construct() throws a PDOException if the attempt to connect to the requested database fails.

    public function __construct(){
    try {
        $this->connexion = new PDO("mysql:host=localhost:3307;dbname=class_exo", "root", "");
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "!!!!!!CONNEXION : AUCUNES ERREURS!!!!!!";
    }catch (PDOexception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}


// enregistrer un user
public function register($login, $password, $email, $firstname, $lastname){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->connexion->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$login, $hashedPassword, $email, $firstname, $lastname]);

    // On stocke les infos dans l'objet après inscription
    $this->login = $login;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
}


// Connexion a son compte
    public function connect($login, $password){
         $stmt = $this->connexion->prepare("SELECT * FROM utilisateurs WHERE login = ?");
         $stmt->execute([$login]);

// fetch_assoc = Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->email = $user['email'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->isConnected = true;
    }
}

    
// Verification de la connection
    public function isConnected(){
        return $this->isConnected;
    }


// bind_param = Lie des variables aux paramètres de la requête préparée en tant que références
// s = string, i = integer, d = double, b = blob

    public function update($login, $password, $email, $firstname, $lastname) {
        if ($this->isConnected) {
            $stmt = $this->connexion->prepare("UPDATE utilisateurs SET login=?, password=?, email=?, firstname=?, lastname=? WHERE id=?");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // password hashed security
            $stmt->bind_param("sssssi", $login, $hashedPassword, $email, $firstname, $lastname, $this->id);
            $stmt->execute();
            $stmt->close();

            $this->login = $login;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
    }



    public function getAllInfos(){
        return [
            "id" => $this->id,
            "login" => $this->login,
            "email" => $this->email,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname
        ];
    }



// Déconnexion
    public function disconnect(){
        $this->id = null;
        $this->login = null;
        $this->email = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->isConnected = false;
    }

// suppression Compte
    public function delete(){
        if ($this->isConnected){
        $stmt = $this->connexion->prepare("Delete FROM utilisateurs WHERE id = ?");
        $stmt->execute(); // excute suppression 
        $stmt->close(); // ferme le compte
        $this->disconnect(); // deconnexion
        }

    }


    public function getLogin() { return $this->login; }
    public function getEmail() { return $this->email; }
    public function getFirstname() { return $this->firstname; }
    public function getLastname() { return $this->lastname; }



}




































