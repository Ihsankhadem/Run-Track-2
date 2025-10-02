
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
    public function __construct(){
    $this->connexion = new mysqli("localhost:3307", "root", "", "class_exo");
      if ($this->connexion->connect_error) {
            die("Connection : it's a fail " . $this->connexion->connect_error);
        }
    }

// enregistrer un user
public function register($login, $password, $email, $firstname, $lastname){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->connexion->prepare(
        "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)"
    );

    // 5 paramètres → "sssss"
    $stmt->bind_param("sssss", $login, $hashedPassword, $email, $firstname, $lastname);

    $stmt->execute();
    $stmt->close();

    // On stocke les infos dans l'objet après inscription
    $this->login = $login;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
}


// Connexion a son compte
    public function connect($login, $password){
         $stmt = $this->connexion->prepare("SELECT * FROM utilisateurs WHERE login = ?");
         $stmt->bind_param("s", $login); // "s" = string
         $stmt->execute();
         $result = $stmt->get_result();
// fetch_assoc = Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
         $user = $result->fetch_assoc();
        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->email = $user['email'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->isConnected = true;
    }
    $stmt->close();
}

    
// Verification de la connection
    public function isConnected(){
        return $this->isConnected;
    }

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




































