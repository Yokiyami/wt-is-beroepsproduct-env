<?php
include_once 'header.php';
include_once './php/passagierstabel.php';
include_once './php/veiligheid.php';
require_once './php/pagina-autorisatie.php';

// CSRF-token genereren
$csrf_token = generateCSRFToken();

medewerkerAutorisatie();

// echo '<p>CSRF-token: ' . $csrf_token . '</p>';

$pagesize = 10;
$start = ontsmet(isset($_GET['start'])) ? ontsmet(intval($_GET['start'])) : 0;
$url = "./medewerker-passagieroverzicht.php";

list($passagiers, $foutmelding) = vulPassagiers();

?>

<div class="zoekbalk">
    <form action="./medewerker-passagieroverzicht.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        <input type="number" name="passagiernummer" placeholder="Passagiernummer" required>
        <input type="submit" value="Zoeken" class="button-link">
    </form>
        <a href="medewerker-passagierinvoer.php" class="button-link">
            <span class="button-text">Nieuwe passagier</span>
        </a>
</div>
<div class="tabel-container">
    <div class="invenster-links">
        <a href="medewerker-vluchtenoverzicht.php">Vluchten</a>
        <a href="medewerker-passagieroverzicht.php">Passagiers</a>
    </div>
    <?php
    echo genereerPassagierTabel($passagiers);
    echo genereerPager($url, $start, $pagesize);
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>