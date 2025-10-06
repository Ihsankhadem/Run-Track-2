

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deconnect</title>
</head>
<body>
    
<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: connect.php");
exit;
?>
</body>
</html>