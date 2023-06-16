<?php
include_once 'header.php';
include_once 'php/vluchtentabel.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

$pagesize = 10;
$start = isset($_GET['start']) ? ontsmet(intval($_GET['start'])) : 0;
$url = "./vluchtenoverzicht.php";

list($vluchten, $kolommen, $foutmelding) = vulVluchten('vluchtenOv', $start, $pagesize);

?>

<div class="zoekbalk">
    <form action="./vluchtenoverzicht.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        <input type="number" name="vluchtnummer" placeholder="Vluchtnummer" required>
        <input type="submit" class="button-link" value="Zoeken">
    </form>
</div>
<div class="tabel-container">
    <?php
    echo genereerTabel($vluchten, $kolommen, 'vluchtentabel.php');
    echo genereerPager($url, $start, $pagesize);
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>