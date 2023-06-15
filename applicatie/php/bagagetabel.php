<?php

require_once './database/bagage-sql.php';
include_once './php/veiligheid.php';

function vulBagage()
{
    $foutmelding = null;
    $vluchtnummer = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
        validateCSRFToken($_POST['csrf_token']);
        $vluchtnummer = ontsmet($_POST["vluchtnummer"]);
    }

    $passagiernummer = ontsmet($_SESSION['username'] ?? null);
    if ($passagiernummer === null) {
        $foutmelding = "Geen passagiernummer gevonden.";
    } else {
        if ($vluchtnummer !== null) {
            $bagage = haalBagageOpVluchtnummer($vluchtnummer, $passagiernummer);
            if (empty($bagage)) {
                $foutmelding = "Er zijn geen vluchten gevonden met het opgegeven vluchtnummer voor deze passagier.";
            }
        } else {
            $bagage = haalPassagierBagage($passagiernummer);
            if (empty($bagage)) {
                $foutmelding = "Geen bagage gevonden.";
            }
        }
    }

    return array($bagage, $foutmelding);
}

function genereerBagageTabel($bagage)
{
    $html = '<table class="tabel">';
    $html .= '<thead><tr><th>Vluchtnummer</th><th>Objectvolgnummer</th><th>Gewicht</th></tr></thead>';
    $html .= '<tbody>';

    foreach ($bagage as $item) {
        foreach ($item['vluchtnummers'] as $vluchtnummer) {
            $html .= '<tr>';
            $html .= "<td>{$vluchtnummer}</td>";
            $html .= "<td>{$item['objectvolgnummer']}</td>";
            $html .= "<td>{$item['gewicht']}</td>";
            $html .= '</tr>';
        }
    }

    $html .= '</tbody></table>';

    return $html;
}
?>