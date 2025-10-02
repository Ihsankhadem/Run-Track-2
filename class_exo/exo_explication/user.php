
<?php

class User{
     
// Attributs de la class
    public $login;
    public $email;

// Le constructeur est une méthode spéciale qui est automatiquement appelée lors de la création d'un nouvel objet avec le mot-clé
// permet d'initialiser les propriétés de l'objet au moment de sa création(meilleur endroit pour effectuer les initialisations nécessaires)
    public function __construct($login, $email){
    // $this->propriete = $valeur;
        $this->login = $login;
        $this->email = $email;
    }

// methode affichage 
    public function sayHello(){
        return "Je suis " . $this->login . " et voici mon email :  " . $this->email;
    }
}




































