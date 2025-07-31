 


<?php

// $hauteur = hauteur du triangle
// $i = quelle ligne tu dessines
// $j = nb d’étoiles  mises sur cette ligne.
// $nbsp = crée un espace
// str_repeat = repete une chaine de texte 

// La boucle extérieure construit les étages du triangle.
// La boucle intérieure place les étoiles de chaque étage.

$hauteur= 5;
  
for ($i = 0; $i < $hauteur; $i++){

    echo str_repeat('&nbsp;',($hauteur-$i)); 
    for($j = 0; $j <= $i; $j++)
    {
        echo "* ";
    }

    echo "<br />";
}





// Moitié de triangla


// <?php

// // $ligne = on compte combien de lignes on a dessinées
// // $colonne = on compte combien d’étoiles on dessine dans la ligne actuelle

// $hauteur = 12;
// $etoile = "*";


// for ($ligne=0; $ligne < $hauteur; $ligne++) { 

//  for ($colonne = 5; $colonne <= $ligne; $colonne++) { 
//     echo $etoile;
// }

// echo "<br>";

// }


?>