<?php
include_once 'header.php';
?>

<div class="formuliervenster">
    <h2>Inchecken Passagier</h2>
    <form action="/submit" method="POST">
        <div class="form-rij">
            <label for="passagiernummer">Passagiernummer:</label>
            <input type="text" id="passagiernummer" name="passagiernummer" required>
        </div>
        <div class="form-rij">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
        </div>
        <div class="form-rij">
            <label for="geslacht">Geslacht:</label>
            <select id="geslacht" name="geslacht" required>
                <option value="">Selecteer geslacht</option>
                <option value="M">Man</option>
                <option value="V">Vrouw</option>
            </select>
        </div>
        <div class="form-rij">
            <label for="vluchtnummer">Vluchtnummer:</label>
            <input type="text" id="vluchtnummer" name="vluchtnummer" required>
        </div>
        <div class="form-rij">
            <label for="stoel">Stoel:</label>
            <input type="text" id="stoel" name="stoel" required>
        </div>
        <div class="form-rij">
            <label for="bagagegewicht">Bagage Gewicht:</label>
            <input type="number" id="bagagegewicht" name="bagagegewicht" step="0.01" required>
        </div>
        <div class="form-rij">
            <label for="balienummer">Balienummer:</label>
            <input type="text" id="balienummer" name="balienummer" required>
        </div>
        <input type="submit" value="Inchecken">
    </form>
</div>

<?php
include_once 'footer.php';
?>