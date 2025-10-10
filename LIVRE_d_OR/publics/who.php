

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui sommes-nous ? - Livre d’or de Lyon</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="main-header">
    <h1>Le Livre d’or de la Ville de Lyon</h1>
    <nav>
        <?php 
        require_once '../includes/users_acess.php'; 
        ?>   
    </nav>
</header>

<main class="who-content">
    <section class="who-hero">
        <img src="../img/lyonold.jpeg" alt="Ancienne vue de Lyon" class="who-img">
        <div class="overlay">
            <div class="hero-text">
                <h2>Qui sommes-nous ?</h2>
                <p>Découvrez l’histoire derrière le Livre d’or de Lyon</p>
            </div>
        </div>
    </section>

    <section class="who-text">
        <h2>Notre mission</h2>
        <p>
            Le <strong>Livre d’or de Lyon</strong> est un projet communautaire né de la passion pour notre ville et son histoire.
            Il permet à tous — visiteurs, habitants, curieux ou amoureux de Lyon — de partager leurs souvenirs, leurs anecdotes et leurs émotions autour de cette cité millénaire.
        </p>

        <h2>🏛️ Une ville, une mémoire</h2>
        <p>
            Lyon, connue depuis l’époque romaine sous le nom de <em>Lugdunum</em>, est un lieu de culture, de patrimoine et de vie.
            Notre objectif est de créer un espace chaleureux où chacun peut contribuer à préserver la mémoire collective de notre belle ville.
        </p>

        <h2>Une communauté ouverte</h2>
        <p>
            Ce site a été conçu pour être accessible à tous : 
            <br>En tant que visiteur, vous pouvez lire les messages laissés dans le livre d’or.  
            <br>En tant que membre, vous pouvez partager les vôtres et rejoindre cette aventure humaine et patrimoniale.
        </p>

        <div class="cta-buttons">
            <?php if (!isset($_SESSION['user'])): ?>
                <a class="btn" href="register.php">Rejoignez-nous</a>
                <a class="btn" href="livreOr.php">Lire le Livre d’Or</a>
            <?php else: ?>
                <a class="btn" href="livreOr.php">Voir le Livre d’Or</a>
                <a class="btn" href="home.php">Retour à l’accueil</a>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require_once '../includes/footer.php'; ?>

</body>
</html>
