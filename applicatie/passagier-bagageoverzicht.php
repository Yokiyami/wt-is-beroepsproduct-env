<?php

include_once 'header.php';
require_once './php/veiligheid.php';
include_once './php/bagagetabel.php';
require_once './php/pagina-autorisatie.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

passagierAutorisatie();

list($bagage, $foutmelding) = vulBagage();

?>

<div class="zoekbalk">
    <form action="./passagier-bagageoverzicht.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        <input type="number" name="vluchtnummer" placeholder="Vluchtnummer" required>
        <input type="submit" value="Zoeken" class="button-link">
    </form>
    <div class="toevoeg-button">
        <a href="passagier-bagagecheckin.php" class="button-link">Bagage inchecken</a>
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