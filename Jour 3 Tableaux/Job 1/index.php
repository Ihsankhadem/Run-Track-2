
<?php

$chiffres = [200, 204, 173, 98, 171, 404, 459];

// Prends chaque élément du tableau $chiffres l’un après l’autre et mets-le dans la variable $chiffre.
foreach ($chiffres as $chiffre) {
// Chiffre est une variable temporaire qui, à chaque tour de boucle, contient la valeur actuelle du tableau = travailler sur un seul nombre à la fois
if ($chiffre % 2 == 0){
    echo"$chiffre est paire<br>";
}
else{
    echo "$chiffre est impaire<br>";
}

}

?>