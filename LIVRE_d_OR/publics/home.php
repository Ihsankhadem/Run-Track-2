<?php
session_start();

// Redirection si non connecté ou si le login est manquant
if (!isset($_SESSION['user']) || empty($_SESSION['user']['login'])) {
    header('Location: connect.php');
    exit();
}

$user = htmlspecialchars($_SESSION['user']['login']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace membre - Livre d’or de Lyon</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <div class="page-wrapper">
        <header class="main-header">
            <h1>Bienvenue, <?= $user ?> !</h1>
        <nav>
            <?php require_once '../includes/users_acess.php'; ?>
        </nav>
        </header>

        <main class="home-content">
            <section class="home-hero">
                <img src="../img/lyon.jpeg" alt="Vue de Lyon" class="home-img">
                <div class="overlay">
                    <div class="hero-text">
                        <h2>Lugdunum à Lyon 💫</h2>
                        <p>Un bond dans le passé</p>
                        <a href="galery.php" class="btn">L'histoire de Lyon en Photos</a>
                    </div>
                </div>
            </section>
        </main>
        <?php require_once '../includes/footer.php'; ?>
    </div>
</body>
</html>
