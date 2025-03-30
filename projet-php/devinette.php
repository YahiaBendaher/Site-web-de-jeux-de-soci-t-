<?php
session_start(); 

if (!isset($_SESSION['nombreMystere'])) {
    $_SESSION['nombreMystere'] = rand(1, 100);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $devinette = $_POST['devinette'];
    if ($devinette > $_SESSION['nombreMystere']) {
        $message = "Trop haut!";
    } elseif ($devinette < $_SESSION['nombreMystere']) {
        $message = "Trop bas!";
    } else {
        $message = "Félicitations! Vous avez deviné le nombre.";
        unset($_SESSION['nombreMystere']);  
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jeu de Devinette</title>
    <link rel="stylesheet" href="mini.css">
</head>
<body>
    <h1>Devinez le nombre</h1>
    <form action="devinette.php" method="post">
        Votre devinette : <input type="text" name="devinette">
        <input type="submit" value="Deviner">
    </form>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
</body>
</html>
