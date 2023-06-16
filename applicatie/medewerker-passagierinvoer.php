<?php

include_once 'header.php';
require_once './php/passagier-invoer.php';
require_once './php/veiligheid.php';
require_once './php/pagina-autorisatie.php';

// CSRF-token genereren
$csrf_token = generateCSRFToken();

medewerkerAutorisatie();

?>

<div class="formuliervenster">
    <h2>Passagier invoeren</h2>
    <form action="./medewerker-passagierinvoer.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
        <div class="form-rij">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" maxlength="30" required placeholder="Naam">
        </div>
        <div class="form-rij">
            <label for="passagiernummer">Passagiernummer:</label>
            <input type="number" id="passagiernummer" name="passagiernummer" required placeholder="Passagiernummer">
        </div>
        <div class="form-rij">
            <label for="vluchtnummer">Vluchtnummer:</label>
            <input type="number" id="vluchtnummer" name="vluchtnummer" required placeholder="Vluchtnummer">
        </div>
        <div class="form-rij">
            <label for="stoel">Stoelnummer:</label>
            <input type="text" id="stoel" name="stoel" maxlength="4" required placeholder="Stoelnummer">
        </div>
        <div class="form-rij">
            <label>Geslacht:</label>
            <div class="radio-options">
                <label>
                    <input type="radio" name="geslacht" value="M" required>
                    Man
                </label>
                <label>
                    <input type="radio" name="geslacht" value="V" required>
                    Vrouw
                </label>
            </div>
        </div>
        <input type="submit" value="Verzenden" class="button-link">
    </form>
</div>

<?php

include_once 'footer.php';

?>