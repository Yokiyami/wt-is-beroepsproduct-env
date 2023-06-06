<?php
include_once 'header.php';
include './php/login-logica.php';
// Controleer of de gebruiker is ingelogd en toon de juiste inhoud
list($logged_in, $html, $redirect) = login();

if (!$logged_in) {
    // Gebruiker is niet ingelogd, toon het inlogformulier
    include_once 'header.php';
?>

<div class="formuliervenster">
    <h2>Login</h2>
    <form action="" method="post">
        <input type="text" name="passagiernummer"><br>
        <input type="password" name="password"><br>
        <input type="submit" value="login">
    </form>
</div>

<?php
} else {
    // Gebruiker is ingelogd, redirect naar de juiste pagina
    header("Location: $redirect");
    exit;
}

include_once 'footer.php';
?>