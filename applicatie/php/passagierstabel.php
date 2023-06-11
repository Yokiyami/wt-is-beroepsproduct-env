<?php

require_once './database/passagierqueries.php';

// Functie om data te ontsmetten
function ontsmet($data) {
    if($data === null) {
        return null;
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Functie om een HTML tabel te genereren uit de gegeven passagiers data
function genereerPassagierTabel($passagiers)
{
    $kolommen = ['naam', 'geslacht', 'passagiernummer', 'stoel', 'checkinpagina'];
    $html = '<table class="tabel"><thead><tr>';

    // Headers genereren
    foreach ($kolommen as $kolom) {
        $html .= "<th>{$kolom}</th>";
    }

    $html .= '</tr></thead><tbody>';

    // Rijen genereren
    foreach ($passagiers as $passagier) {
        $html .= '<tr>';
        foreach ($kolommen as $kolom) {
            if($kolom != 'checkinpagina') {
                if (array_key_exists($kolom, $passagier)) {
                    $waarde = ontsmet($passagier[$kolom]);
                    $html .= '<td data-label="' . $kolom . '">' . $waarde . '</td>';
                }
            }
        }
        $html .= '<td data-label="checkinpagina"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    return $html;
}

// Maakt een pager
function genereerPager($url, $start, $pagesize) {
    $pageback = $start - $pagesize;
    $pageback = $pageback < 0 ? 0 : $pageback;
    $totalrows = getAantalPassagiers()[0]["count"]; // let op de gewijzigde index

    $pagefw = $start + $pagesize;
    $pagefw = $pagefw > $totalrows ? $start : $pagefw;

    $result = "<div class='button-container'><a href='$url?pagesize=$pagesize&start=$pageback'><button type='button'>Vorige</button></a><a href='$url?pagesize=$pagesize&start=$pagefw'><button type='button'>Volgende</button></a></div>";
    return $result;
}

// Functie om passagiers data op te halen op basis van de gegeven POST request
function vulPassagiers()
{
    $pagesize = 10;
    $start = isset($_GET['start']) ? intval(ontsmet($_GET['start'])) : 0;
    $passagiers = array();
    $foutmelding = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["passagiernummer"])) {
        $passagiernummer = ontsmet($_POST["passagiernummer"]);
        $passagiers = haalPassagiers($passagiernummer);
        // Als er geen passagiers worden geretourneerd, maak een foutmelding
        if (empty($passagiers)) {
            $foutmelding = "Er zijn geen passagiers gevonden met het opgegeven passagiernummer.";
        }
    } else {
        $passagiers = haalPassagiers(null, $start, $pagesize);
    }

    return array($passagiers, $foutmelding);
}
?>