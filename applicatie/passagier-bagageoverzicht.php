<?php

include_once 'header.php';
include_once 'php/bagagetabel.php';

list($bagage, $foutmelding) = vulBagage();

?>

<div class="zoekbalk">
    <form action="./passagier-bagageoverzicht.php" method="POST">
        <input type="text" name="objectnummer" placeholder="Zoek hier op objectnummer" />
        <input type="submit" value="Zoeken" />
    </form>
    <div class="toevoeg-button">
        <!-- <input type="submit" value="Bagage inchecken" /> -->
        <a href="passagier-bagagecheckin.php"><button>Bagage inchecken</button></a>
    </div>
</div>
<div class="tabel-container">
    <div class="invenster-links">
        <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
        <a href="passagier-bagageoverzicht.php">Bagage</a>
    </div>
    <?php
    echo genereerBagageTabel($bagage);
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>