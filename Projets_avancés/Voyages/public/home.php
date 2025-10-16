

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voyages Voyages</title>

  <link rel="stylesheet" href="../css/voyage.css">
  <script src="../js/script.js" defer></script>
</head>

<body>

  <header role="banner">
    <h1>Voyagez aux pays imaginaires</h1>

    <button id="profileBtn" class="profil" aria-label="Ouvrir le profil">
      <img src="../img/team1.jpeg" alt="Photo de profil de l'utilisateur">
    </button>
  </header>

    <video autoplay muted loop playsinline class="video" aria-hidden="true">
    <source src="../video/nature.mp4" type="video/mp4">
    Votre navigateur ne supporte pas les vidéos HTML5.
    </video>

    <main>
    <section class="container" aria-label="Choix de destination">
        <article class="box" tabindex="0">
        <h2>Destination Surprise</h2>
        </article>

        <article class="box" tabindex="0">
        <h2>Destination à Vous</h2>
        </article>

        <article class="box" tabindex="0">
        <h2>Destination Réelle</h2>
        </article>
    </section>
    </main>

  <aside class="sidebar" id="sidebar" aria-labelledby="profileBtn" aria-hidden="true">
    <button class="close-btn" id="closeBtn" aria-label="Fermer le panneau">&times;</button>

    <div class="profil-info">
      <img src="../img/team1.jpeg" alt="Photo de profil de l'utilisateur">
      <nav aria-label="Navigation du profil">
        <ul>
          <li><a href="#">Profil</a></li>
          <li><a href="#">Voyages à venir</a></li>
          <li><a href="#">Calendrier</a></li>
          <li><a href="#">Budget</a></li>
          <li><a href="#">Paramètres</a></li>
          <li><a href="logout.php">Déconnexion</a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <footer role="contentinfo">
    <p>&copy; 2024 Voyages Voyages — Tous droits réservés.</p>
  </footer>
</body>
</html>
