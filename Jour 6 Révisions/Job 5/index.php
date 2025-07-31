


<?php
// Etapes :
// Donne un style par défaut	
// Vérifie le formulaire	
// Récupère la valeur	
// Vérifie la validité	
// Applique le style choisi


// Initialisation d'une valeur par défaut
$selectedStyle = 'style1.css';


// $_SERVER	Un tableau spécial contenant des infos sur la page et le serveur
// "REQUEST_METHOD"	Demande quel mode d'accès a été utilisé
// "GET"	Tu ouvres une page ou passes des infos dans l’URL
// "POST"	Tu envoies des données via un formulaire (plus discret)


// C’est une condition pour savoir si un formulaire a été envoyé ou pas = evite les erreurs
//Le visiteur a rempli la fiche de style (le formulaire) et a coché son choix 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["style"])) { // vérifie que le champ "style" a bien été rempli dans le formulaire
// il enregistre le style choisis
    $style = $_POST["style"];
// verifie ds le stock si le style choisis existe
    if (in_array($style, ['style1.css', 'style2.css', 'style3.css'])) {
// il applique le style car ds ce cas celui ci existe
        $selectedStyle = $style;
    }
}

// Tu es serveur :
// Si on dit "je regarde juste", c’est un GET.
// Si on dit "je commande ça", c’est un POST.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusion dynamique et sécurisé du style -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars($selectedStyle); ?>">
    <title>Choix de style</title>
</head>
<body>
    
<form method="POST" action="#">
    <label for="style">Choisis un style :</label>
    <select id="prefix" name="style">
        <option value="style1.css">Style N°1</option>
        <option value="style2.css">Style N°2</option>
        <option value="style3.css">Style N°3</option>
    </select>
    <button type="submit">Appliquer</button>
</form>

</body>
</html>


