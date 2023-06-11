<?php
include_once 'header.php';
include_once 'php/vluchtentabel.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

list($vluchten, $kolommen, $foutmelding) = vulVluchten('vluchtenOv');

?>

<div class="zoekbalk">
    <form action="./vluchtenoverzicht.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        <input type="text" name="vluchtnummer" placeholder="Zoek hier op vluchtnummer" />
        <input type="submit" value="Zoeken" />
    </form>
</div>
<div class="tabel-container">
    <?php
    echo genereerTabel($vluchten, $kolommen, 'vluchtentabel.php');
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>