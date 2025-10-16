


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deconnexion</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
    
    <?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
    ?>

    <h1>Vous êtes déconnecté.</h1>
    <p><a href="connect.php">Se reconnecter</a></p>
    
</body>
</html>