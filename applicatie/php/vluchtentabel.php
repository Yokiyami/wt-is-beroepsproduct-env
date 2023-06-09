<?php

require_once './database/vluchtenqueries.php';

//Vluchtdetails ophalen
if (isset($_GET['vluchtnummer'])) {
  $vluchtnummer = $_GET['vluchtnummer'];
} else {
  $vluchtnummer = null;
}

if (!isset($_GET['pagina'])) {
  $pagina = 1;
} else {
  $pagina = $_GET['pagina'];
}

$vluchten_per_pagina = 10;
$offset = ($pagina - 1) * $vluchten_per_pagina;

list($vluchten) = haalVluchten($vluchtnummer, $offset, $vluchten_per_pagina);

if (isset($vluchten[$vluchtnummer])) {
  $vlucht = reset($vluchten);
} else {
  $vlucht = null;
}

// Functie om een HTML tabel te genereren uit de gegeven vluchten data en kolommen
function genereerTabel($vluchten, $kolommen)
{
  $html = '<table class="tabel"><thead><tr>';

  // Headers genereren
  foreach ($kolommen as $kolom) {
    $html .= "<th>{$kolom}</th>";
  }

  $html .= '</tr></thead><tbody>';

  // Rijen genereren
  foreach ($vluchten as $vlucht) {
    $html .= '<tr>';
    foreach ($kolommen as $kolom) {
      if ($kolom == 'Detailpagina') {
        $detailpagina = 'medewerker-vluchtdetails.php?vluchtnummer=' . $vlucht['Vluchtnummer'];
        $html .= '<td data-label="' . $kolom . '"><a href="' . $detailpagina . '"><button>Details</button></a></td>';
      } else {
        $html .= '<td data-label="' . $kolom . '">' . $vlucht[$kolom] . '</td>';
      }
    }
    $html .= '</tr>';
  }

  $html .= '</tbody></table>';

  return $html;
}

// Functie om vluchten data op te halen op basis van de gegeven pagina type en POST request
function vulVluchten($paginaType = null)
{
    global $verbinding;

    $vluchten = array();
    $kolommen = array();
    $foutmelding = null;
    $passagiernummer = $_SESSION['username'] ?? 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
        $vluchtnummer = $_POST["vluchtnummer"];
        $vluchten = haalVluchten($vluchtnummer);
        // Als er geen vluchten worden geretourneerd, maak een foutmelding
        if (empty($vluchten)) {
            $foutmelding = "Er zijn geen vluchten gevonden met het opgegeven vluchtnummer.";
        }
    } else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["vluchtnummer"]) && $paginaType === 'vluchtenDt') {
        $vluchtnummer = $_GET["vluchtnummer"];
        $vluchten = array(haalVluchtDetails($vluchtnummer));
        // Als er geen vluchten worden geretourneerd, maak een foutmelding
        if (empty($vluchten)) {
            $foutmelding = "Er is geen vlucht gevonden met het opgegeven vluchtnummer.";
        }
    } else {
        // Als een passagiernummer is meegegeven, haal alleen de vluchten op voor die passagier
        if ($passagiernummer !== null && $paginaType === 'vluchtenPa') {
            $vluchten = haalPassagierVluchten($passagiernummer);
        } else {
            $vluchten = haalVluchten(null);
        }
    }

    // Een array met kolomdefinities voor verschillende pagina types
    $kolommen = array(
      'vluchtenMw' => ['Datum', 'Vluchtnummer', 'Luchthaven', 'Gate', 'Detailpagina'],
      'vluchtenPa' => ['Datum', 'Vluchtnummer', 'Gate', 'Bestemming', 'Maatschappij', 'Bagage'],
      'vluchtenOv' => ['Datum', 'Vluchtnummer', 'Gate', 'Bestemming', 'Maatschappij'],
      'vluchtenDt' => ['Datum', 'Vluchtnummer', 'Bestemming', 'Gate', 'Luchthaven', 'Max aantal', 'Maatschappij']
  );

    $kolomDefinities = $kolommen[$paginaType] ?? null; // Zorg voor een standaardwaarde als de sleutel niet bestaat

    return array($vluchten, $kolomDefinities, $foutmelding);
}
?>