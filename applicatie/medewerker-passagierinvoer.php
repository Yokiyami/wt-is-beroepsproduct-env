<?php

include_once 'header.php';

    ?>

<div class="formuliervenster">
    <h2>Passagier invoeren</h2>
    <form action="/submit" method="POST">
        <div class="form-rij">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
        </div>
        <div class="form-rij">
            <label for="passagiernummer">Passagiernummer:</label>
            <input type="text" id="passagiernummer" name="passagiernummer" required>
        </div>
        <div class="form-rij">
            <label for="stoelnummer">Stoelnummer:</label>
            <input type="text" id="stoelnummer" name="stoelnummer" required>
        </div>
        <div class="form-rij">
            <label for="geslacht">Geslacht:</label>
            <div class="radio-options">
                <label>
                    <input type="radio" name="geslacht" value="man" required>
                    Man
                </label>
                <label>
                    <input type="radio" name="geslacht" value="vrouw" required>
                    Vrouw
                </label>
            </div>
        </div>
        <input type="submit" value="Verzenden">
    </form>
</div>

<?php

include_once 'footer.php';

    ?>