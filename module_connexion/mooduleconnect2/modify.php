

<?php
require_once 'config.php';

$mc = moduleconnect::getInstance();
$errors = [];

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['user']['username'];
$email = $_SESSION['user']['email'];

// Si l'utilisateur soumet le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = trim($_POST['username'] ?? '');
    $newEmail = trim($_POST['email'] ?? '');
    $newPassword = trim($_POST['password'] ?? '');

     if (empty($newUsername) || empty($newEmail)) {
        $errors[] = "Le nom d'utilisateur et l'email sont obligatoires.";
    } else {
        $result = $mc->updateUser($username, $newUsername, $newEmail, $newPassword);

        if ($result === true) {
            $_SESSION['user']['username'] = $newUsername;
            $_SESSION['user']['email'] = $newEmail;
            echo "<p>Modifications enregistrées avec succès !</p>";
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
    <title>Modifier le profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
        <h2>Modifier mon profil</h2>

  <form action="modify.php" method="post">
            <div class="sucess">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" value="<?= htmlspecialchars($username) ?>" required>
            </div>

            <div class="sucess">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>

            <div class="sucess">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Nouveau mot de passe">
            </div>

            <button type="submit">Enregistrer</button>
        </form>

        <a class="return-link" href="index.php">⬅ Retour à l'accueil</a>
    </div>

</body>
</html>
