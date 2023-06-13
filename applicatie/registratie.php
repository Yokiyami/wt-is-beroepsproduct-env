<?php

require_once './php/veiligheid.php';
include_once 'header.php';
require_once './php/registratie-logica.php';

// CSRF-token genereren
$csrf_token = generateCSRFToken();

?>

<div class="formuliervenster">
    <h2>Aanmelden</h2>
    <p>Meld je aan om te kunnen inloggen</p>

    <form method="POST" action="registratie.php">
        <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">
        <div class="form-field">
            <label for="passagiernummer">Passagiernummer</label><br>
            <input required type="number" name="passagiernummer" id="passagiernummer" />
        </div>

        <div class="form-field">
            <label for="pass">Wachtwoord(max 15 tekens)</label><br>
            <input required type="pass" name="pass" id="pass" maxlength="15"/>
        </div>

        <div class="form-field">
            <label for="pass_repeat">Wachtwoord herhalen</label><br>
            <input required type="password" name="pass_repeat" id="pass_repeat" maxlength="15"/>
        </div>

        <input type="submit" value="Meld je nu aan!" />
    </form>
</div>
<?php

include_once 'footer.php';

?>
