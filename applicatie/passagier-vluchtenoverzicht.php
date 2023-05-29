<?php
include_once 'header.php';
include_once 'functies.php';

list($vluchten, $kolommen) = vulVluchten('vluchtenOv');

?>

<div class="tabel-container">
    <div class="invenster-links">
        <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
        <a href="passagier-bagageoverzicht.php">Bagage</a>
    </div>
    <?php
    echo genereerTabel($vluchten, $kolommen);
    ?>
</div>

<?php

include_once 'footer.php';

    ?>