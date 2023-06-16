<?php

require_once './database/passagier-tabel-sql.php';
include_once './php/veiligheid.php';

// Functie om een HTML tabel te genereren.
function genereerPassagierTabel($passagiers)
{
    $kolommen = ['Naam', 'Geslacht', 'Passagiernummer', 'Stoel', 'Checkinpagina'];
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
            if ($kolom != 'Checkinpagina') {
                if (array_key_exists($kolom, $passagier)) {
                    $waarde = ontsmet($passagier[$kolom]);
                    $html .= '<td data-label="' . $kolom . '">' . $waarde . '</td>';
                }
            }
        }
        $html .= '<td data-label="Checkinpagina"><a href="medewerker-checkin.php" class="button-link"><span class="button-text">Check-in</span></a></td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    return $html;
}

// Maakt een pager
function genereerPager($url, $start, $pagesize)
{
    $url = ontsmet($url);
    $start = intval(ontsmet($start));
    $pagesize = intval(ontsmet($pagesize));
    $pageback = $start - $pagesize;
    $pageback = $pageback < 0 ? 0 : $pageback;
    $totalrows = ontsmet(getAantalPassagiers()[0]["count"]);

    $pagefw = $start + $pagesize;
    $pagefw = $pagefw > $totalrows ? $start : $pagefw;

    $result = "<div class='button-container'><a href='$url?pagesize=$pagesize&start=$pageback' class='button-link'><span class='button-text'>Vorige</span></a><a href='$url?pagesize=$pagesize&start=$pagefw' class='button-link'><span class='button-text'>Volgende</span></a></div>";
    return $result;    
}

function vulPassagiers()
{
    $pagesize = 10;
    $start = ontsmet(isset($_GET['start'])) ? intval(ontsmet($_GET['start'])) : 0;
    $passagiers = array();
    $foutmelding = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (isset($_POST["csrf_token"])) {
            if (isset($_POST["passagiernummer"])) {
                $passagiernummer = ontsmet($_POST["passagiernummer"]);
                $passagiers = haalPassagiers(ontsmet($passagiernummer));
                // Als er geen passagiers worden geretourneerd, maak een foutmelding
                if (empty($passagiers)) {
                    $foutmelding = "Er zijn geen passagiers gevonden met het opgegeven passagiernummer.";
                }
            }
        } else {
            $foutmelding = "Foute of missende CSRF token.";
        }
    } else {
        $passagiers = haalPassagiers(null, $start, $pagesize);
    }

    return array($passagiers, $foutmelding);
}
?>