<?php

require_once 'passagierqueries.php';

///////////////////////////////////////////////////////////////////////////PASSAGIERSTABEL////////////////////////////////////////////////////////////////////////////////////
// Functie om vooraf gedefinieerde passagiers op te halen
// function haalPassagiers($passagiernummer = null)
// {
//     $passagiers = array(
//         "PAS001" => array(
//             "naam" => "Jan Jansen",
//             "geslacht" => "Man",
//             "passagiernummer" => "PAS001",
//             "stoel" => "12A",
//             "checkinpagina" => "medewerker-checkin.php"
//         ),
//         "PAS002" => array(
//             "naam" => "Petra Pietersen",
//             "geslacht" => "Vrouw",
//             "passagiernummer" => "PAS002",
//             "stoel" => "12B",
//             "checkinpagina" => "medewerker-checkin.php"
//         ),
//         // ...
//     );

    // // Als er een passagiernummer is opgegeven, retourneer alleen die passagier, een lege array bij niet bestaande passagier.
    // if ($passagiernummer !== null) {
    //     if (isset($passagiers[$passagiernummer])) {
    //         $passagiers = array($passagiernummer => $passagiers[$passagiernummer]);
    //     } else {
    //         // Als het passagiernummer niet in de array bestaat, retourneer een lege array
    //         $passagiers = array();
    //     }
    // }

    // return $passagiers;

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
            if ($kolom == 'checkinpagina') {
                $html .= '<td data-label="checkinpagina"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>';
            } else {
                $html .= '<td data-label="' . $kolom . '">' . $passagier[$kolom] . '</td>';
            }
        }
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    return $html;
}

// Functie om passagiers data op te halen op basis van de gegeven POST request
function vulPassagiers()
{
    $passagiers = array();
    $foutmelding = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["passagiernummer"])) {
        $passagiers = haalPassagiers($_POST["passagiernummer"]);
        // Als er geen passagiers worden geretourneerd, maak een foutmelding
        if (empty($passagiers)) {
            $foutmelding = "Er zijn geen passagiers gevonden met het opgegeven passagiernummer.";
        }
    } else {
        $passagiers = haalPassagiers(null);
    }

    return array($passagiers, $foutmelding);
}
?>