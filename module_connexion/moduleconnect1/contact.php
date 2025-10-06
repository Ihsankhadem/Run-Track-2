
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
    <h1>🍊 Contactez-nous 🍊</h1>

    <p>Nous sommes là pour répondre à toutes vos questions sur nos fruits frais et nos services.</p>

    <section class="contact-form-section">
        <form method="POST" action="#">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="email" name="email" placeholder="Votre email" required>
            <input type="text" name="subject" placeholder="Sujet" required>
            <textarea name="message" rows="5" placeholder="Votre message" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </section>

    <section class="contact-info">
        <h2>Nos coordonnées</h2>
        <p>📍 Adresse : 123 Rue des Fruits, Paris</p>
        <p>📞 Téléphone : 01 773 454 67 89</p>
        <p>✉ Email : contact@orange.com</p>
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
