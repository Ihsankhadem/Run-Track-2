
<?php

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";
$longueur = 0;

// compter les caracteres avc une boucle et un isset =  Détermine si une variable est définie et est différente de NULL
while (isset($str[$longueur])){
    $longueur++;  // incrémenter $longueur à chaque tour tant qu’il existe un caractère
}


// Parcourir en sautant 1 caractère sur 2
for ($i=0; $i < $longueur ; $i+=2) {  // i+=2 commence la chaine caractere a 2
        echo $str[$i];
}


?>