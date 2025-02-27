<?php
include_once 'header.php';
require_once './php/medewerker-checkin-logica.php';
require_once './php/veiligheid.php';
require_once './php/pagina-autorisatie.php';

// CSRF-token genereren
$csrf_token = generateCSRFToken();

medewerkerAutorisatie();

    ?>

<div class="formuliervenster">
    <h2>Inchecken Passagier</h2>
    <form action="medewerker-checkin.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="form-rij">
            <label for="passagiernummer">Passagiernummer:</label>
            <input type="number" id="passagiernummer" name="passagiernummer" required placeholder="Passagiernummer">
        </div>
        <div class="form-rij">
            <label for="vluchtnummer">Vluchtnummer:</label>
            <input type="number" id="vluchtnummer" name="vluchtnummer" required placeholder="Vluchtnummer">
        </div>
        <div class="form-rij">
            <label for="gewicht">Bagage Gewicht:</label>
            <input type="number" id="gewicht" name="gewicht" step="0.01" required placeholder="Bagage gewicht">
        </div>
        <div class="form-rij">
            <label for="objectvolgnummer">Objectvolgnummer:</label>
            <input type="number" id="objectvolgnummer" name="objectvolgnummer" min="0" max="9" required placeholder="Objectnr">
        </div>
        <div class="form-rij">
            <label for="balienummer">Balienummer:</label>
            <select id="balienummer" name="balienummer" required>
                <option value="">Selecteer Balie</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <input type="submit" value="Inchecken" class="button-link">
    </form>
</div>

<?php
include_once 'footer.php';
?>