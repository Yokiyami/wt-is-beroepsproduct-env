<?php

include_once 'header.php';
require_once './functies/registratie-logica.php';

?>

<div class="formuliervenster">
    <h2>Aanmelden</h2>
    <p>Meld je aan om te kunnen inloggen</p>

    <form method="POST" action="registratie.php">
        <div class="form-field">
            <label for="passagiernummer">Passagiernummer</label><br>
            <input required type="text" name="passagiernummer" id="passagiernummer" />
        </div>

        <div class="form-field">
            <label for="firstname">Voornaam</label><br>
            <input required type="text" name="firstname" id="firstname" />
        </div>

        <div class="form-field">
            <label for="lastname">Achternaam</label><br>
            <input required type="text" name="lastname" id="lastname" />
        </div>

        <div class="form-field">
            <label for="email">Email</label><br>
            <input required type="email" name="email" id="email" />
        </div>

        <div class="form-field">
            <label for="pass">Wachtwoord</label><br>
            <input required type="pass" name="pass" id="pass" />
        </div>

        <div class="form-field">
            <label for="pass_repeat">Wachtwoord herhalen</label><br>
            <input required type="password" name="pass_repeat" id="pass_repeat" />
        </div>


        <input type="submit" value="Meld je nu aan!" />
    </form>
</div>
<?php

include_once 'footer.php';

?>