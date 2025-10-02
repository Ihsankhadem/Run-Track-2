

<?php
require_once "user.php"; 

$user = new User();

// --- Exemple 1 : Inscription d’un utilisateur ---
echo "<h3>Test Inscription d’un utilisateur</h3>";
$user->register("nashi", "123456", "nashi@gmail.com", "Ihsan", "Buisson");

echo "<pre>";
print_r($user->getAllInfos());
echo "</pre>";

// --- Exemple 2 : Connexion ---
echo "<h3>Test connexion</h3>";
$user->connect("nashi", "123456"); // login + mot de passe choisis à l'inscription
echo $user->isConnected() ? "Connecté" : "Non connecté";

echo "<br>";

// --- Exemple 3 : Infos utilisateur ---
echo "<h3>Test getAllInfos -> Infos utilisateur</h3>";
echo "<pre>";
print_r($user->getAllInfos());
echo "</pre>";




