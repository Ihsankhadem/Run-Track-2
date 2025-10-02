

<?php
require_once "user.php"; 

$user = new User();

echo "<h3>Test Inscription d’un utilisateur</h3>";
// appelles la méthode register() de ta classe pour enregistrer un utilisateur avec les attributs
$user->register("nashi", "123456", "nashi@gmail.com", "Ihsan", "LUNAIRE");


// <pre> = HTML qui affiche le texte tel qu’il est formaté (alignement des tableaux, retours à la ligne → ça rend la sortie lisible).
//print_r($user->getAllInfos()) = affiche le tableau retourné par ta fonction getAllInfos() (avec les clés id, login, email, etc)
echo "<pre>";
print_r($user->getAllInfos());
echo "</pre>";


echo "<h3>Test connexion</h3>";
$user->connect("nashi", "123456"); // login + mot de passe choisis à l'inscription
echo $user->isConnected() ? "Connecté" : "Non connecté"; // condit° ternaire

echo "<br>";


echo "<h3>Test getAllInfos -> Infos utilisateur</h3>";
echo "<pre>";
print_r($user->getAllInfos());
echo "</pre>";




