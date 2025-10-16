
<?php
session_start();

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
  <title>Galerie de Lyon et son histoire</title>
  <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
<div class="page-wrapper">

        <header class="main-header">
            <h1> Bonjour <?= htmlspecialchars($_SESSION['user']['login']) ?> </h1>
        <nav>
            <?php require_once '../includes/users_acess.php'; ?>
        </nav>
        </header>

  <main class="gallery-content">
    <section class="gallery-intro">
      <h2>Découvrez Lyon à travers le temps</h2>
      <p>
        De la colline de Fourvière aux quais du Rhône, revivez l’évolution de la capitale des Gaules à travers des photos.
      </p>
    </section>

    <section class="photo-gallery">
      <div class="gallery-item">
        <img src="../img/fourviere.jpeg" alt="Basilique de Fourvière">
        <div class="caption">
          <h3>Basilique de Fourvière</h3>
          <p>Symbole de la ville, surplombant Lyon depuis le XIXe siècle.</p>
        </div>
      </div>

      <div class="gallery-item">
        <img src="../img/vieuxlyon.jpeg" alt="Vieux Lyon">
        <div class="caption">
          <h3>Vieux Lyon</h3>
          <p>Quartier Renaissance classé au patrimoine mondial de l’UNESCO.</p>
        </div>
      </div>

      <div class="gallery-item">
        <img src="../img/bellecours.jpeg" alt="Place Bellecour">
        <div class="caption">
          <h3>Place Bellecour</h3>
          <p>L’une des plus grandes places d’Europe, cœur de la Presqu’île.</p>
        </div>
      </div>

      <div class="gallery-item">
        <img src="../img/confluence.jpeg" alt="Quartier de la Confluence">
        <div class="caption">
          <h3>La Confluence</h3>
          <p>Symbole du renouveau urbain lyonnais, au sud de la Presqu’île.</p>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>© 2025 Livre d’or de Lyon — Tous droits réservés</p>
  </footer>

</div>
</body>
</html>
