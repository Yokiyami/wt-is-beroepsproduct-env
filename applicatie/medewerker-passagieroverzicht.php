<?php
include_once 'header.php';
include_once './php/passagierstabel.php';

list($passagiers, $foutmelding) = vulPassagiers();
$pagesize = 10;
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$url = "./medewerker-passagieroverzicht.php";

?>

<div class="zoekbalk">
    <form action="./medewerker-passagieroverzicht.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
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
    echo genereerPager($url, $start, $pagesize);
    if ($foutmelding !== null) {
        echo "<p>{$foutmelding}</p>";
    }
    ?>
</div>

<?php

include_once 'footer.php';

?>