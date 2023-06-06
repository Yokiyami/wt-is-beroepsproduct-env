<?php include './php/login-loguitknop.php';
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>Gelre Checkin</title>
</head>

<body>
    <header>
        <img src="img/logo.png" alt="Een plaatje van een vliegtuigje als een logo">
        <h1> Gelre Checkin</h1>
        <div class="login-button">
            <?php toonLoginUitlogKnop(); ?>
        </div>
    </header>
    <nav class="desktop-nav">
        <ul>
            <a href="index.php">Startpagina</a>
            <a href="privacyverklaring.php">Privacyverklaring</a>
            <a href="contact.php">Contact</a>
            <a href="vluchtenoverzicht.php">Vluchtenoverzicht</a>
        </ul>
    </nav>
    <nav class="mobile-nav">
        <form action="php/dropdown-menus.php" method="GET">
            <select name="pagina" onchange="this.form.submit()">
                <option disabled selected>Menu</option>
                <option value="/index.php">Startpagina</option>
                <option value="/privacyverklaring.php">Privacyverklaring</option>
                <option value="/contact.php">Contact</option>
                <option value="/vluchtenoverzicht.php">Vluchtenoverzicht</option>
            </select>
        </form>
    </nav>
    <div class="main-container">
    