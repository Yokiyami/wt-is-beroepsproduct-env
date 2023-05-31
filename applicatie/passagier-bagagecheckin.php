<?php
include_once 'header.php';
?>

<div class="formuliervenster">
    <h2>Inchecken Bagage</h2>
    <form action="/submit" method="POST">
        <div class="form-rij">
            <label for="passagiernummer">Passagiernummer:</label>
            <input type="text" id="passagiernummer" name="passagiernummer" required>
        </div>
        <div class="form-rij">
            <label for="objectvolgnummer">Object Volgnummer:</label>
            <input type="number" id="objectvolgnummer" name="objectvolgnummer" required>
        </div>
        <div class="form-rij">
            <label for="gewicht">Gewicht:</label>
            <input type="number" id="gewicht" name="gewicht" step="0.01" required>
        </div>
        <input type="submit" value="Inchecken Bagage">
    </form>
</div>

<?php
include_once 'footer.php';
?>