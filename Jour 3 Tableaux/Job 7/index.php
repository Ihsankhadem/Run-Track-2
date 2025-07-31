


<?php
  
// 🔄 C’est comme si les lettres glissaient toutes d’une place vers la gauche,
// et la première lettre se retrouve à la fin ! ✨

  $str ="Certaines choses changent, et d'autres ne changeront jamais.";
  $longueur = 2;

  while (isset($str[$longueur])){
    $longueur++;
  }



// $i = 0 : on commence au premier caractère (index 0)
// $i < $longueur : on continue tant qu’on n’a pas atteint la fin
// $i++ : on avance d’un caractère à chaque tour

for ($i= 0; $i < $longueur ; $i++) { 

    if ($i == $longueur - 1){
        // si $i = dernier caractères
        echo $str[0];
        // Si c’est le dernier caractère, on ne peut pas afficher “le suivant” (il n’y en a pas),
            // alors on affiche le premier caractère de la chaîne ($str[0]) pour boucler.
    }
    else{
        // sinon pour les autres affichent le caractère suivant
        echo $str[$i +1];
    }
}


?>

