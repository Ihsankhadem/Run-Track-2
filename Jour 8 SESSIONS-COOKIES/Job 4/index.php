


<?php

// Si bouton "deconnexion" → supprimer le cookie et recharger la page
// Sinon si bouton "connexion" → créer le cookie avec prénom
// Si cookie "prenom" existe → afficher bonjour + bouton déconnexion
// Sinon → afficher formulaire

// Session = rapide et sécurisé pendant la visite.
// Cookie = garde le prénom pour les prochaines visites.



session_start();
$cookie_time = 3600;

if (isset($_POST["deconnexion"])){
    setcookie("prenom", "", time() - 3600);
    session_destroy();
    header('Location: index.php'); // recharge la page
    exit;

} 

if(isset($_POST["connexion"]) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    setcookie("prenom", $prenom, time() + $cookie_time); // stocke le prenom ds cookie
    $_SESSION['prenom'] = $prenom; // stocke prenom ds session
    header("Location: index.php");
    exit;
}


// pour synchroniser cookies et session = quand session expiré -> cookies tjrs existant = reconnait user
if (isset($_COOKIE['prenom']) && !empty($_SESSION['prenom'])){
    $_SESSION['prenom'] = $_COOKIE['prenom'];
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexion</title>
</head>
<body>


    <ul>
 <!-- vérifie si une session avec le prénom existe si true = user connecté / : = debut bloc de code-->
        <?php if (isset($_SESSION['prenom'])): ?>
<!-- chapeau et point d'interrogation = php echo -->
            <h1>Bonjour <?= htmlspecialchars($_SESSION['prenom']) ?> !!!!!</h1>
            <form method="POST">
                <button type="submit" name="deconnexion">Déconnexion</button>
            </form>
        <?php else: ?>
            <form method="POST">
                <input type="text" name="prenom" placeholder="Ton prénom">
                <button type="submit" name="connexion">Connexion</button>
            </form>
        <?php endif; ?>

    </ul>


</body>
</html>