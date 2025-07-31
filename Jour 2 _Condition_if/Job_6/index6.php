

<?php

$largeur = 40;  
$hauteur = 20; 
$etoile = "*";


for ($ligne = 0; $ligne < $hauteur; $ligne++) {

    for ($colonne = 0; $colonne < $largeur; $colonne++) {
        echo $etoile;
    }

    echo "<br>";
}

?>
