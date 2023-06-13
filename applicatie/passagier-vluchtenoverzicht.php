<?php
include_once 'header.php';
include_once 'php/vluchtentabel.php';
require_once './php/pagina-autorisatie.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

passagierAutorisatie();

list($vluchten, $kolommen, $foutmelding) = vulVluchten('vluchtenPa');

?>

<div class="tabel-container">
    <div class="invenster-links">
        <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
        <a href="passagier-bagageoverzicht.php">Bagage</a>
    </div>
    <?php
    echo genereerTabel($vluchten, $kolommen, 'passagier-vluchtenoverzicht.php');
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>