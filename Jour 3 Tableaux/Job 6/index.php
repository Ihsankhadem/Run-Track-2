


<?php
// C’est un bonhomme qui part de la fin et recule lettre par lettre jusqu’au début pour tout afficher à l’envers ! ✨
// on indique à la page de s’afficher en UTF-8



$str ="Les choses que l'on possede finissent par nous posseder.";
$longueur = 0;

while (isset($str[$longueur])){
    $longueur++;  // tant qu’il existe un caractère à cet index ++
}


// la boucle part du last caractères de la chaine et remonte jusqu'au 1er (index 0)
// on commence a longueur-1 puis on décrémente
for ($i= $longueur-1; $i >= 0 ; $i--) {  // s’arrête quand on a atteint l’index 0 = premier caractère de la chaîne
     echo $str[$i];
}


?>

