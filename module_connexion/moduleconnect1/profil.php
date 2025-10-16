
<?php
require_once 'config.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: connect.php"); // redirection si pas connecté
    exit;
}

// Récupère l'utilisateur depuis la session
$user = $_SESSION['user'];
?>



<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact - ManguOrange</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>🍊 Espace ManguOrange 🍊</h1>
    <p>Bonjour <b><?php echo htmlspecialchars($user['prenom'] . " " . $user['nom']); ?></b> ! Profitez de nos fruits frais 🍓🍌🍍</p>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="profil.php">Mon profil</a> 
        <a href="who.php">Qui sommes-nous ?</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>


<div class="container">
    <h1>🍊 Mon Profil 🍊</h1>

    <section class="profile-section">
        <h2>Paramètres du compte</h2>
        <form>
            <input type="text" value="monlogin" placeholder="Login">
            <input type="text" value="Mon prénom" placeholder="Prénom">
            <input type="text" value="Mon nom" placeholder="Nom">
            <input type="password" placeholder="Nouveau mot de passe">
            <button type="submit">Mettre à jour</button>
        </form>
    </section>

    <section class="profile-section">
        <h2>Historique des achats</h2>
        <table class="purchase-history">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix (€)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Banane</td>
                    <td>2 kg</td>
                    <td>5,00</td>
                </tr>
                <tr>
                    <td>Pomme</td>
                    <td>1,5 kg</td>
                    <td>4,50</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="profile-section">
        <a class="logout-btn" href="deconnect.php">Se déconnecter</a>
    </section>
</div>

<footer>
    <div class="footer-container">
        <p>🍊 ManguOrange - Tous droits réservés &copy; 2025</p>
        <p>
            <a href="index.php">Accueil</a> |
            <a href="contact.php">Contact</a> |
            <a href="who.php">Qui sommes-nous ?</a>
        </p>
    </div>
</footer>


</body>
</html>

