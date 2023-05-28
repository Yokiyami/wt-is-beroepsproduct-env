<?php

include_once 'header.php';

    ?>

<div class="formuliervenster">
    <h2>Contactformulier</h2>
    <br>
    <form action="/contact" method="POST">
        <div>
            <label for="name">Naam:</label>
            <br>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <br>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Bericht:</label>
            <br>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div>
            <input type="submit" value="Verzenden">
        </div>
    </form>
</div>

<?php

include_once 'footer.php';

    ?>