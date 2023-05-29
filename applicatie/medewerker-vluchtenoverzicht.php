<?php
include_once 'header.php';
include_once 'functies.php';

list($vluchten, $kolommen) = vulVluchten('vluchtenMw');

?>

<div class="zoekbalk">
    <form action="./medewerker-vluchtenoverzicht.php" method="POST">
        <input type="text" name="vluchtnummer" placeholder="Zoek hier op vluchtnummer" />
        <input type="submit" value="Zoeken" />
    </form>
    <div class="toevoeg-button">
        <!-- <input type="submit" value="Nieuwe vlucht" /> -->
        <a href="medewerker-vluchtinvoer.php"><button>Nieuwe vlucht</button></a>
    </div>
</div>
<div class="tabel-container">
    <div class="invenster-links">
        <a href="medewerker-vluchtenoverzicht.php">Vluchten</a>
        <a href="medewerker-passagieroverzicht.php">Passagiers</a>
    </div>
    <?php
    echo genereerTabel($vluchten, $kolommen);
    ?>
</div>

<?php

include_once 'footer.php';

?>