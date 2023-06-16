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
    $kolommen = ['Vluchtnummer', 'Objectvolgnummer', 'Gewicht'];
    $html = '<table class="tabel"><thead><tr>';

    // Headers genereren
    foreach ($kolommen as $kolom) {
        $html .= "<th>{$kolom}</th>";
    }

    $html .= '</tr></thead><tbody>';

    // Rijen genereren
    foreach ($bagage as $item) {
        foreach ($item['vluchtnummers'] as $vluchtnummer) {
            $html .= '<tr>';
            foreach ($kolommen as $kolom) {
                $kolomLower = strtolower($kolom);
                if (array_key_exists($kolomLower, $item)) {
                    $waarde = ontsmet($item[$kolomLower]);
                    $html .= '<td data-label="' . $kolom . '">' . $waarde . '</td>';
                } else if ($kolomLower == 'vluchtnummer') {
                    $waarde = ontsmet($vluchtnummer);
                    $html .= '<td data-label="Vluchtnummer">' . $waarde . '</td>';
                }
            }
            $html .= '</tr>';
        }
    }

    $html .= '</tbody></table>';

    return $html;
}
?>