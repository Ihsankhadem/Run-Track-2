
<?php
session_start();
require_once '../includes/config.php';

$cnx = livreor::getInstance();
$errors = [];

if (!isset($_SESSION['user'])) {
    header("Location: connect.php");
    exit;
}

$login = $_SESSION['user']['login'];
$email = $_SESSION['user']['email'];

// gestion et traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newLogin = trim($_POST['login'] ?? '');
    $newEmail = trim($_POST['email'] ?? '');
    $newPassword = trim($_POST['password'] ?? '');

    if (empty($newLogin) || empty($newEmail)) {
        $errors[] = "Le nom d'utilisateur et l'adresse e-mail sont obligatoires.";
    } else {
        $result = $cnx->updateUser($login, $newLogin, $newEmail, $newPassword);

        if ($result === true) {
            $_SESSION['user']['login'] = $newLogin;
            $_SESSION['user']['email'] = $newEmail;
            $success = "Modifications enregistrées avec succès !";
        } else {
            $errors[] = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - Livre d’or de Lyon</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
<div class="page-wrapper">
    <header class="main-header">
        <h1>Mon Profil</h1>
    <nav>
        <?php 
        require_once '../includes/users_acess.php'; 
        ?>   
    </nav>
    </header>

    <main class="home-content">
        <section class="profile-section">
            <h2>Modifier mes informations</h2>

            <?php if (!empty($errors)): ?>
                <div class="errors">
                    <?php foreach ($errors as $err): ?>
                        <p><?= htmlspecialchars($err) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <p class="success"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>

            <form action="profil.php" method="post" class="profile-form">
                <label for="login">Nom d’utilisateur</label>
                <input type="text" name="login" id="login" value="<?= htmlspecialchars($login) ?>" required>

                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>

                <label for="password">Nouveau mot de passe</label>
                <input type="password" name="password" id="password" placeholder="••••••••••">

                <input type="submit" value="Enregistrer les modifications" class="btn">
            </form>

            <div class="back-link">
                <a href="home.php">⬅ Retour à l’accueil</a>
            </div>
        </section>
    </main>

    <?php require_once '../includes/footer.php'; ?>

</div>
</body>
</html>
