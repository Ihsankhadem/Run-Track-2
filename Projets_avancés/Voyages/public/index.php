<?php
session_start();
// 👉 Sans ce require_once, le code ne saurait pas ce que Auth::getInstance() signifie.
require_once '../config/auth.php';
// Ici, on récupère une instance unique de la classe Auth (grâce au design pattern “Singleton”).
// 👉 Ça veut dire qu’il n’y aura qu’une seule connexion à la base pendant tout le script.
$auth = Auth::getInstance();
// On prépare un tableau vide pour y stocker les messages d’erreur(exemple : “Mot de passe incorrect”).
$errors = [];

// Cette condition vérifie que le formulaire a bien été soumis (méthode POST).
// Si tu visites juste la page sans rien envoyer, le code à l’intérieur ne s’exécute pas.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // On vérifie que le formulaire envoyé contient action=login.
// 👉 Cela veut dire : l’utilisateur essaie de se connecter.
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
  // trim() supprime les espaces au début/fin.
// On récupère ce que l’utilisateur a tapé.
        $nom = trim($_POST['username']);
        $password = trim($_POST['password']);
// On appelle la méthode connect() de la classe Auth.
// Cette méthode va :
// Chercher l’utilisateur dans la base.
// Vérifier le mot de passe avec password_verify().
// Retourner true si tout est bon, sinon un message d’erreur.
        $result = $auth->connect($nom, $password);
// On stocke les infos de l’utilisateur dans $_SESSION['user'].
// Puis on redirige vers la page home.php.
// exit() arrête le script immédiatement après la redirection.
        if ($result === true) {
            $_SESSION['user'] = [
                'id' => $auth->getId(),
                'nom' => $auth->getNom(),
                'email' => $auth->getEmail(),
            ];
            header('Location: home.php');
            exit();
    // On ajoute le message d’erreur dans le tableau $errors.
        } else {
            $errors[] = $result;
        }
// Ici, on vérifie si action=register.
// 👉 Donc, l’utilisateur essaie de créer un compte.
// 'register' = ds le formulaire value = 'register'
    } elseif (isset($_POST['action']) && $_POST['action'] === 'register') {
        $nom = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
// La méthode register() va :
// Vérifier si l’utilisateur existe déjà.
// Hacher le mot de passe (password_hash()).
// Enregistrer le nouvel utilisateur.

        $result = $auth->register($nom, $email, $password);

        if ($result === true) {
            header('Location: index.php?registered=1');
            exit();
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
  <title>Voyages Voyages</title>
  <link rel="stylesheet" href="../css/visit.css">
  <script src="../js/script.js" defer></script>
</head>
<body>

  <video autoplay muted loop playsinline class="video" aria-hidden="true">
    <source src="../video/nature1.mp4" type="video/mp4">
  </video>

  <header>
    <h1>Voyagez aux Pays Imaginaires</h1>
  </header>

  <main>
    <section class="hero">
      <div class="overlay"></div>
      <div class="content">
        <h2>Explorez, Rêvez, Partez 🌿</h2>
        <div class="btn-group">
          <button id="openAuth" class="btn">Rejoignez l'Aventure</button>
        </div>
      </div>
    </section>
  </main>

  <?php if (!empty($errors)): ?>
    <div class="errors">
      <?php foreach ($errors as $error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Modal Auth -->
  <div id="authModal" class="modal" aria-hidden="true">
    <div class="modal-content">
      <button id="closeModal" class="close-btn">×</button>

      <form id="loginForm" method="POST">
        <h2>Connexion</h2>
        <input type="text" name="username" placeholder="Nom d'utilisateur ou email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="hidden" name="action" value="login">
        <button type="submit">Se connecter</button>
        <p><a href="#" id="showRegister">Créer un compte ?</a></p>
      </form>

      <form id="registerForm" method="POST" style="display:none;">
        <h2>Inscription</h2>
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Adresse e-mail" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="hidden" name="action" value="register">
        <button type="submit">S'inscrire</button>
        <p><a href="#" id="showLogin">Déjà inscrit ? Se connecter</a></p>
      </form>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 Voyages Voyages — Tous droits réservés.</p>
  </footer>
</body>
</html>
