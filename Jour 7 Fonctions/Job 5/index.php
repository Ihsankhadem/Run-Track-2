
<?php

// $str = le texte à analyser, $char = le caractère qu'on cherche dans ce texte
 function occurrences($str, $char){
    $count_occ = 0;

    for ($i=0; $i < strlen($str); $i++) { 
        if (($str[$i])== $char){
            echo $count_occ++;
        }
    }
    return $count_occ;
 }
echo occurrences("les nuages bleu", "a"); // la lettre a apparait 1 fois 

?>