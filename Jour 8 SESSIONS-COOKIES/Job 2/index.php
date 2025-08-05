

<?php

session_start();
$cookie_time = 3600;


if (isset($_POST['reset'])){
    setcookie('nbvisites', '', time() - 3600);
    $visites = 0;
    
} else {
                    // condition ? valeur_si_vrai : valeur_si_faux;
            // verifie que le cookie existe si oui garde la valeur sinon cookie = 0
    $visites = (isset ($_COOKIE['nbvisites'])) ? (int)$_COOKIE['nbvisites'] : 0;
    $visites++; 
    setcookie('nbvisites',$visites, time() + $cookie_time);
}


 

// ou plus simplement :

// if (isset($_COOKIE['nbvisites'])) {
//     $visites = (int)$_COOKIE['nbvisites'];
// } else {
//     $visites = 0;
// }
// $visites++;
// setcookie('nbvisites', $visites, time() + $cookie_duration);


?>


<!DOCTYPE html>
<html>
    <head>

    </head>
    
    <body>


<!-- appel la session nbvisites pour calculer le nd de consultations de la pages -->
<h2>Nombre de visites : <?php echo $visites; ?></h2>



 <div style="max-width: 600px; margin: auto; font-family: Arial,  line-height: 1.6;">
  <h2>🍪 Recette de Cookies Gourmands</h2>
  <p>Une recette adorée par les petits et les grands : les cookies !<br>
  Réalise des cookies gourmands et moelleux à souhait avec cette recette facile et rapide !</p>

  <h3>⏱️ Temps total : 23 min</h3>
  <ul>
    <li><strong>Préparation :</strong> 10 min</li>
    <li><strong>Cuisson :</strong> 13 min</li>
    <li><strong>Niveau :</strong> Facile</li>
    <li><strong>Pour :</strong> 10 cookies</li>  
  </ul>  

  <h3>🧾 Ingrédients</h3>
  <ul>
    <li>225 g de farine</li>
    <li>40 g de sucre blanc</li>
    <li>40 g de sucre roux</li>
    <li>110 g de beurre mou</li>
    <li>130 g de pépites de chocolat</li>
    <li>1 œuf</li>
    <li>1 pincée de sel</li>
    <li>1 càc de levure chimique</li>
    <li>1/2 càc d arôme de vanille</li>
  </ul>

  <h3>👨‍🍳 Préparation</h3>
  <ol> 
    <li>Préchauffe le four à 180°C.</li>
    <li>Réalise un beurre pommade en le passant 15 secondes au micro-ondes.</li>
    <li>Fouette énergiquement le beurre avec le sucre blanc et le sucre roux.</li>
    <li>Ajoute l’œuf, l’arôme de vanille, la pincée de sel, puis fouette à nouveau jusqu’à obtenir un mélange homogène.</li>
    <li>Verse la farine et la levure, puis mélange à l’aide d’une maryse.</li>
    <li>Incorpore les pépites de chocolat toujours avec la maryse.</li>
    <li>Forme des boules de pâte et dispose-les sur une plaque recouverte de papier cuisson.</li>
    <li>Aplatis légèrement les boules avec la paume de la main.</li>
    <li>Enfourne pendant 13 minutes.</li>
    <li>Laisse refroidir sur une grille… et régale-toi ! 😋</li>
  </ol>
</div>





<form method="POST">
<button type="submit" name="reset">Reset</button>
</form>

    </body>
</html>