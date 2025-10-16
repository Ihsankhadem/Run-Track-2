


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
    <title>Espace ManguOrange - Boutique de fruits</title>
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


<main class="fruit-store">
    <div class="fruit-card">
        <img src="images/banane.jpeg" alt="Banane">
        <h3>Banane</h3>
        <p class="price">2,50 € / kg</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/pomme.jpeg" alt="Pomme">
        <h3>Pomme</h3>
        <p class="price">3,00 € / kg</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/ananas.jpeg" alt="Ananas">
        <h3>Ananas</h3>
        <p class="price">4,50 € / pièce</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/raisin.jpeg" alt="Raisin">
        <h3>Raisin</h3>
        <p class="price">3,80 € / kg</p>
        <button>Ajouter au panier</button>
    </div>



        <div class="fruit-card">
        <img src="images/abricot.jpeg" alt="Abricot">
        <h3>Abricot</h3>
        <p class="price">7,46 € / kg</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/peche.jpeg" alt="Pêche">
        <h3>Pêche</h3>
        <p class="price">5,00 € / kg</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/poire.jpeg" alt="Poire">
        <h3>Poire</h3>
        <p class="price">1,50 € / pièce</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/fruitdragon.jpeg" alt="Fruit du dragon">
        <h3>Fruit du dragon</h3>
        <p class="price">20,90 € / kg</p>
        <button>Ajouter au panier</button>
    </div>

    <div class="fruit-card">
        <img src="images/pasteque.jpeg" alt="pasteque">
        <h3>Pastèque</h3>
        <p class="price">10,50 € / pièce</p>
        <button>Ajouter au panier</button>
    </div>
    <div class="fruit-card">
        <img src="images/figue.jpeg" alt="figue">
        <h3>Figue</h3>
        <p class="price">7,23 € / kg</p>
        <button>Ajouter au panier</button>
    </div>
</main>

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


