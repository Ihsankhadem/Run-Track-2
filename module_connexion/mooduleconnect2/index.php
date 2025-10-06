

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Module de connexion</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <h1>Bienvenue sur la page d'accueil</h1>

    <div class="links">
        <a href="connect.php">Se connecter</a>
        <a href="register.php">Créer un compte</a>
        <a href="modify.php">Modifier mon compte</a>
        <a href="deconnect.php">Se déconnecter</a>
    </div>

    <div class="status">
        <?php if (isset($_SESSION['user'])): ?>
            <p> Connecté en tant que : <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong></p>
            <p>Email : <?= htmlspecialchars($_SESSION['user']['email'] ?? 'non défini') ?></p>
        <?php else: ?>
            <p>Vous n'êtes pas connecté.</p>
        <?php endif; ?>
    </div>

</body>
</html>
