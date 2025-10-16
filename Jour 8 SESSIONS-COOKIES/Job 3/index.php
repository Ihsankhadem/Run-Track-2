



<?php

session_start();
$cookie_time = 3600;


if (isset($_COOKIE['nbvisites'])) { // nbvisites = nom du cookies / lire le cookie
    $visites = (int)$_COOKIE['nbvisites']; // $visites c le nb de vue de la page
} else {
    $visites = 0;
}
$visites++;
setcookie('nbvisites', $visites, time() + $cookie_time);

// si le formulaire est envoyé && verifie que la valeur ne soit pas vide
if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']); // protège la donnée pour éviter des problèmes de sécurité
    $_SESSION['prenoms'][] = $prenom; //  ajout du prénom à la liste des prénoms stockée dans la session
}


?>


<!DOCTYPE html>
<html>
 <head>

</head>
    
 <body>

        <!-- appel la session nbvisites pour calculer le nd de consultations de la pages -->
    <h2>Nombre de visites : <?php echo $visites; ?></h2>

       <h2>Prénoms liste :</h2>
    <ul>
        <?php
            foreach ($_SESSION['prenoms'] as $liste_nom) {
                echo "<li>" . htmlspecialchars($liste_nom) . "</li>";
            }
        ?>
    </ul>


    <form method="POST">
        <input type="text" name="prenom" placeholder = "Ecrit ton Prénom" >
        <button type="submit" name="reset">Reset</button>
    </form>

    </body>
</html>