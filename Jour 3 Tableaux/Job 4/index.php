<?php

$str = "Dans l'espace, personne ne vous entend crier";
$longueur = 0;

while (isset($str[$longueur])){
    $longueur++;
}

echo $longueur; // nb de caractères

?>