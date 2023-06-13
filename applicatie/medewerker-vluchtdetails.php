<?php
include_once 'header.php';
include_once 'php/vluchtentabel.php';
require_once './php/pagina-autorisatie.php';

// CSRF-token
$csrf_token = generateCSRFToken();

medewerkerAutorisatie();

// var_dump($vluchten);
// var_dump($vlucht);

list($vluchten, $kolommen, $foutmelding) = vulVluchten('vluchtenDt');

?>

<div class="tabel-container">
    <h1>Vluchtdetails</h1>
    <br>
    <?php
    echo genereerTabel($vluchten, $kolommen, 'medewerker-vluchtdetails.php');
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

    ?>