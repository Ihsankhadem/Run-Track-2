<?php
session_start();
require_once '../includes/config.php';
$cnx = livreor::getInstance();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $result = $cnx->register($login, $email, $password);

    if ($result === true) {
        header('Location: connect.php');
        exit();
    } else {
        $errors[] = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription - Livre d'or de Lyon</title>
<link rel="stylesheet" href="../css/style1.css">
</head>
<body>

<main class="auth-container">
    <form method="POST" action="register.php" class="profile-form">
        <h2>Créer un compte</h2>

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <?php foreach($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <label for="login">Nom d'utilisateur</label>
        <input type="text" id="login" name="login" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <label for="password">Confirmer le Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="S'inscrire" class="btn">
        <p class="back-link">Déjà un compte ? <a href="connect.php">Connectez-vous ici</a></p>
        <p class="back-link"><a href="index.php">Retour à l'accueil</a></p>
    </form>
</main>

</body>
</html>
