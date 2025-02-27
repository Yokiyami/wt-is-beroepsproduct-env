<?php

include_once 'header.php';
require_once './php/login-logica.php';
require_once './php/veiligheid.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

// Controleer of de gebruiker is ingelogd en toon de juiste inhoud
list($logged_in, $html, $redirect) = login();
?>

<div class="formuliervenster">
    <h2>Login</h2>
    <form action="" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="text" name="passagiernummer" maxlength="20" required placeholder="Passagiernr/medewerker"><br>
        <input type="password" name="password" maxlength="20" required placeholder="Wachtwoord"><br>
        <input type="submit" value="login" class="button-link">
    </form>
</div>

<?php
include_once 'footer.php';
?>