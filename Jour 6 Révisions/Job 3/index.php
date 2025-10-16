


<?php

// JOUR 3 :

/////////////////////////////////////////// job 1  ///////////////////////////////////

// $nombres = [200, 204, 173, 98, 171, 404, 459];

// foreach ($nombres as $nombre){
//     if ($nombre %2 == 0){
//         echo "$nombre est pair<br>";
//     } else {
//         echo "$nombre est impair<br>";
//     }
// }




//////////////////////////////////////////// job 2 /////////////////////////////////////////////

// $str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";
// $longueur = strlen($str);

// for ($i =0; $i  < $longueur ; $i +=2) { // on icrémente de 2
//     echo $str[$i];
// }



///////////////////////////////////// job 3/////////////////////////////////////

// $str = "I'm sorry Dave I'm afraid I can't do that.";
// $voyelles = ["a", "e", "i", "o", "u", "y", "A","E","I", "O","U","Y"];

// for ($i=0; $i < strlen($str); $i++) { 
// // créat° d'un booléen qui vérifie si le caractère courant est une voyelle
//     $justVoyelles = in_array($str[$i],$voyelles); 
        
//     if ($justVoyelles){   
//         echo $str[$i];
//     }
// } fermer php


//////////////////////////// job 4 ///////////////////////////////


// $str ="Dans l'espace, personne ne vous entend crier";

// for ($i=0; $i < strlen($str); $i++) { 
//     echo $str[$i];
// }
// echo "<br>Nombre de lettres : " .  strlen($str);


//////////////////////////// job 5 //////////////////////////

// $str = "On nest pas le meilleur quand on le croit mais quand on le sait";
// $dico = [
//     "consonnes" => 0,
//     "voyelles" => 0
// ];
// $voyelles = ["a", "e", "i", "o", "u", "y", "A","E","I", "O","U","Y"];

// for ($i=0; $i < strlen($str); $i++) { 
 
// // regarde si caractere(str$i) est ds tableau de voyelles et stocke le resultat true ou false ds $justVoyelles
//      $justVoyelles = in_array($str[$i],$voyelles); 

// // C’est une fonction PHP qui vérifie si un caractère est une lettre de l’alphabet.
//      if (ctype_alpha($str[$i])) { 
        
//         if ($justVoyelles){   
//             $dico["voyelles"]++;
//     } else {
//             $dico["consonnes"]++;
//         }
//      }
// }


// echo "<br><br>";
// echo "<table border = 1>";
// echo "<thead><tr><th>Voyelles</th><th>Consonnes</th></tr></thead>";

// echo "<tr><th>". $dico["voyelles"] ."</th><th>".$dico["consonnes"]."</th></tr>";
// echo "</table>";


////////////////////// job 6 /////////////////////////////////////////

// $str = "Les choses que l'on possede finissent par nous posseder";
// $longueur = 0;

// while (isset($str[$longueur])){
//     $longueur++;  
// }

// for ($i= $longueur-1; $i >= 0 ; $i--) {
//     echo $str[$i];
// }


////////////////////////// job 7 ////////////////////

// $str = "Certaines choses changent, et d'autres ne changeront jamais.";
//  $longueur = 2;

//   while (isset($str[$longueur])){
//     $longueur++;
//   }

// for ($i= 0; $i < $longueur ; $i++) { 

//     if ($i == $longueur - 1){
//         echo $str[0];
//     } else{
//         echo $str[$i +1];
//     }
// }



?>




