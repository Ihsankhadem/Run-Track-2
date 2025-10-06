
<?php
require_once 'config.php';
$mc = moduleconnect::getInstance();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $email = trim($_POST['email'] ?? '');   
    $result = $mc->register($username, $email, $password);

    if ($result === true) {
        $_SESSION['user'] = [
            'username' => $mc->getUsername(),
            'email' => $mc->getEmail()
        ];
        header("Location: connect.php");
        exit;
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
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
        <h2>📝 Inscription</h2>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error) echo htmlspecialchars($error) . "<br>"; ?>
            </div>
        <?php endif; ?>

        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Adresse email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Créer un compte</button> 
        </form>

        <a class="return-link" href="connect.php">Déjà un compte ? Connecte-toi</a>
        <a class="return-link" href="index.php">Retour à l’accueil</a>
    </div>

</body>
</html>
