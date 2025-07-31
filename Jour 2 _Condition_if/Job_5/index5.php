
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Exo 3</title>
</head>
<body>


<?php

// Faire une boucle for de 2 à 1000.

//Pour chaque nombre $i, vérifier s’il est premier :

//Tu fais une autre boucle interne qui va de 2 à $i-1 :

// Si tu trouves un diviseur ($i % $j == 0), alors $i n’est pas premier.

// Si tu n’as trouvé aucun diviseur, c’est un nombre premier.

// Afficher $i avec un <br> s’il est premier.

$estPremier = true;

for ($i = 2; $i <= 1000; $i++){
    $estPremier = true;

    for($j = 2; $j <= $i-1; $j++){  //  on teste tous les diviseurs possibles de 2 jusqu’à un nombre juste avant i. car 2- 1 = impossible
        
        if ($i % $j == 0){      // on vérifie si i est divisible par j (sans reste). Si c’est vrai → i n’est pas premier.
            $estPremier = false ;    // "ce nombre n’est pas un nombre premier, car on a trouvé un diviseur"
            break;
}
}
    if ($estPremier) {
         echo $i . "<br>";
}
}


  // FAUX
    // if ($i % 2 == 0){
    //     echo $i . "<br>";
    // }

    // else if ($i % $j == 0){
    //     echo "non premier" ;
    // }

    // else {
    //     echo "good" ;
    // }


?>

</body>
</html> 