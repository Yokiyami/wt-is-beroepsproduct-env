<?php
include_once 'header.php';

function haalVluchten($vluchtnummer = null)
{
    $vluchten = array(
        "KL124" => array(
            "datum" => "01-05-2023 09:00",
            "vluchtnummer" => "KL124",
            "luchthaven" => "Schiphol",
            "gate" => "A1",
            "detailpagina" => "medewerker-vluchtdetails.php"
        ),
        "KL125" => array(
            "datum" => "02-05-2023 09:00",
            "vluchtnummer" => "KL125",
            "luchthaven" => "Schiphol",
            "gate" => "A1",
            "detailpagina" => "medewerker-vluchtdetails.php"
        ),
        "KL126" => array(
            "datum" => "03-05-2023 09:00",
            "vluchtnummer" => "KL126",
            "luchthaven" => "Schiphol",
            "gate" => "A1",
            "detailpagina" => "medewerker-vluchtdetails.php"
        ),
    );

    if ($vluchtnummer !== null && array_key_exists($vluchtnummer, $vluchten)) {
        return array($vluchten[$vluchtnummer]);
    } else {
        return $vluchten;
    }
}

$vluchten = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
    $vluchten = haalVluchten($_POST["vluchtnummer"]);
} else {
    $vluchten = haalVluchten();
}

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
    <table class="tabel">
        <thead>
            <tr>
                <th>Datum &amp; tijd</th>
                <th>Vluchtnr</th>
                <th>Luchthaven</th>
                <th>Gate</th>
                <th>Detailpagina</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($vluchten as $vlucht) {
                echo '
                <tr>
                <td data-label="Datum">' . $vlucht["datum"] . '</td>
                <td data-label="Vluchtnr">' . $vlucht["vluchtnummer"] . '</td>
                <td data-label="Luchthaven">' . $vlucht["luchthaven"] . '</td>
                <td data-label="Gate">' . $vlucht["gate"] . '</td>
                <td data-label="Detailpagina"><a href="' . $vlucht["detailpagina"] . '"><button>Details</button></a></td>
                </tr>
            ';
            }
            ?>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php';

?>