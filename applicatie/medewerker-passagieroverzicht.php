<?php
include_once 'header.php';
include_once 'functies.php';

list($passagiers, $foutmelding) = vulPassagiers();

?>

<div class="zoekbalk">
    <form action="./medewerker-passagieroverzicht.php" method="POST">
        <input type="text" name="passagiernummer" placeholder="Passagiernummer" />
        <input type="submit" value="Zoeken" />
    </form>
    <div class="toevoeg-button">
        <!-- <input type="submit" value="Nieuwe passagier" /> -->
        <a href="medewerker-passagierinvoer.php"><button>Nieuwe passagier</button></a>
    </div>
</div>
<div class="tabel-container">
    <div class="invenster-links">
        <a href="medewerker-vluchtenoverzicht.php">Vluchten</a>
        <a href="medewerker-passagieroverzicht.php">Passagiers</a>
    </div>
    <?php
    echo genereerPassagierTabel($passagiers);
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>