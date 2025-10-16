<?php

// CREATIONS DES VARIABLES + FONCTIONS + TABLEAUX  = BASE DE DONNEES


// Définition des variables en commencant avc $
$nom = "Ihsan";   // variable texte (string)
$age = 25;        // variable nombre entier (int)
$prix = 12.50;    // nombre à virgule flottante (float)
$estMajeur = true; // booléen (true ou false)

$a = 10;
$b = 5;

function direBonjour($nom) {
    echo "Bonjour " . $nom . " !<br>";
}

$fruits = ["Pomme", "Banane", "Cerise"];

$prenoms = ["Ihsan", "Marie", "Paul"];


// AFFICHAGE UNIQUEMENT

// Appel Variables -> Affichage a l'ecran
echo "Nom : " . $nom . "<br>";  
echo "Age : " . $age . "<br>";
echo "Prix : " . $prix . " €<br>";
echo "Majeur ? " . $estMajeur . "<br>";


// Opérations
echo $a + $b;  // addition : 15
echo "<br>";
echo $a - $b;  // soustraction : 5
echo "<br>";
echo $a * $b;  // multiplication : 50
echo "<br>";
echo $a / $b;  // division : 2
echo "<br>";

// OpérationsConditions (if / else)
if ($age >= 18) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}

//Boucles (while, for)
for ($i = 1; $i <= 5; $i++) {   // Affiche les nombres de 1 à 5
    echo $i . "<br>";  
}

//Fonctions
direBonjour("Ihsan");
direBonjour("Marie");

//Tableaux
echo $fruits[0]; // Affiche Pomme
echo "<br>";

foreach ($fruits as $fruit) {   // Parcourir tous les fruits
    echo $fruit . "<br>";
}



echo "<h2>Vérif table</h2>";

echo "<br><br>";         // petit espace avant la table
echo "<table border='1'>";
echo "<tr><th>Index</th><th>Prénom</th></tr>";


// Pour chaque élément du tableau $prenoms, place la clé (position) 
// dans $index et la valeur (le prénom) dans $prenom
foreach ($prenoms as $index => $prenom) {
    echo "<tr><td>$index</td><td>$prenom</td></tr>";
}
// Pour chaque prénom dans le tableau $prenoms, crée une ligne HTML de tableau 
// affichant sa position ($index) et le prénom ($prenom). 


echo "</table>";


?>
