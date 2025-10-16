


<?php

// Si bouton "deconnexion" → supprimer le cookie et recharger la page
// Sinon si bouton "connexion" → créer le cookie avec prénom
// Si cookie "prenom" existe → afficher bonjour + bouton déconnexion
// Sinon → afficher formulaire

// Session = rapide et sécurisé pendant la visite.
// Cookie = garde le prénom pour les prochaines visites.



session_start();
$cookie_time = 3600; // durée validité cookie

if (isset($_POST["deconnexion"])){ // cliquer sur deconexion = destruction de tt
    setcookie("prenom", "", time() - 3600); // cookie detruit
    session_destroy(); // session detruite
    header('Location: index.php'); // recharge la page
    exit;

} 
// si le formulaire est envoyé && verifie que la valeur ne soit pas vide
if(isset($_POST["connexion"]) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']); // netoie prenom pour eviter erreur
    setcookie("prenom", $prenom, time() + $cookie_time); // stocke le prenom ds cookie pour prochaines visites
    $_SESSION['prenom'] = $prenom; // stocke prenom ds session pour usage a l'instant t
    header("Location: index.php");
    exit;
}


// pour synchroniser cookies et session = quand session expiré -> cookies tjrs existant = reconnait user = recrée session a partir cookie
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
 <!-- Si l'utilisateur est connecté (via session), on affiche le message de bienvenue et le bouton de déconnexion : -->
            <h1>Bonjour <?= htmlspecialchars($_SESSION['prenom']) ?> !!!!!</h1>
            <form method="POST">
                <button type="submit" name="deconnexion">Déconnexion</button>
            </form>
        <?php else: ?>
<!-- Sinon, on affiche le formulaire de connexion : -->
            <form method="POST">
                <input type="text" name="prenom" placeholder="Ton prénom">
                <button type="submit" name="connexion">Connexion</button>
            </form>
        <?php endif; ?>

    </ul>

<!-- Pourquoi on fait ça dans des conditions PHP ?
Parce qu’on veut :
afficher ou cacher des éléments
personnaliser le texte (ex. Bonjour [prenom])
montrer un formulaire seulement si besoin
éviter que l’utilisateur voit un bouton "Connexion" alors qu’il est déjà connecté -->


 <!-- Et si tu écrivais le formulaire hors de PHP sans condition ?
Tu aurais à la fois :
le message "Bonjour [prenom]"
et le formulaire affiché en même temps ➜ ce n’est pas logique pour l'utilisateur.  VOIR COURS -->

</body>
</html>