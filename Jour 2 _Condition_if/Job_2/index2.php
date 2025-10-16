<?php

// ce for n'affiche que les nb a remove de la liste = inverse de la consigne 
//for ($i= 0; $i <= 1337; $i++){
  //if( $i == 26 || $i == 37 || $i == 88 || $i == 1111 || $i == 3233) { // ||= OU 
   // echo $i. "<br>";
  //}
//}

echo "<br>";

// afficher la liste sans les nb a remove
for ($i= 0; $i <= 1337; $i++){
    if ($i !== 26 && $i !== 37 && $i !== 88 && $i !== 1111 && $i !== 3233 ) {
        echo $i . "\n";
    }
}


?>