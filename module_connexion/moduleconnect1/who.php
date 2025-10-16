
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
    <p>Bonjour <b><?php echo htmlspecialchars($user['prenom'] . " " . $user['nom']); ?></b> ! Profitez de nos fruits frais</p>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="profil.php">Mon profil</a> 
        <a href="who.php">Qui sommes-nous ?</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<div class="container">
    <h1>🍊 Qui sommes-nous ? 🍊</h1>

    <section class="who-section">
        <p>Bienvenue sur ManguOrange, votre boutique en ligne de fruits frais !</p>
        <p>Nous sélectionnons avec soin des fruits de qualité et nous livrons directement chez vous pour que vous puissiez profiter de produits frais chaque jour.</p>
        <p>Notre équipe est passionnée par la nutrition et les fruits, et nous voulons vous offrir une expérience agréable, colorée et saine </p>
    </section>

    <section class="team-section">
        <h2>Notre équipe</h2>
        <div class="team-cards">
            <div class="team-card">
                <img src="images/team1.jpeg" alt="Membre de l'équipe">
                <h3>Marnie</h3>
                <p>Fondatrice & Responsable qualité</p>
            </div>
            <div class="team-card">
                <img src="images/team2.jpeg" alt="Membre de l'équipe">
                <h3>Nausicaa</h3>
                <p>Logistique & Livraison</p>
            </div>
            <div class="team-card">
                <img src="images/team3.jpeg" alt="Membre de l'équipe">
                <h3>Kiki</h3>
                <p>Marketing & Communication</p>
            </div>
        </div>
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
