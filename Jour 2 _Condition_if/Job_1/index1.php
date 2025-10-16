
<?php

// for (initialisation ; condition ; incrémentation)  
    // $i <= 1337 : condition = boucle tourne tant que $i est inférieur ou égal à 1337.
    //  i++ = incrémenter $i de 1 à chaque tour de boucle


for ($i = 0;  $i <= 1337; $i++) {   // Affiche les nombres de 1 à 1337 
    if ($i == 42) {
     echo "<b><u>$i</u></b><br>";}  //  b= gras / u = souligné  
 else {
   echo $i . "\n"; // n= saut ligne en console

 }
}

?>

