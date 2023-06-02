<?php

require_once './queries/vluchtenqueries.php';

//Vluchtdetails ophalen
if (isset($_GET['vluchtnummer'])) {
  $vluchtnummer = $_GET['vluchtnummer'];
} else {
  $vluchtnummer = null;
}

list($vluchten, $kolommen) = haalVluchten($vluchtnummer, $paginaType ?? null);

if (isset($vluchten[$vluchtnummer])) {
  $vlucht = reset($vluchten);
} else {
  $vlucht = null;
}

/////////////////////////////////////////////////////////////////////////////VLUCHTENTABEL/////////////////////////////////////////////////////////////////////////////////
// Functie om vooraf gedefinieerde vluchten op te halen
// function haalVluchten($vluchtnummer = null, $paginaType = null)
// {
//   $vluchten = array(
//     "KL124" => array(
//       "datum" => "01-05-2023 09:00",
//       "vluchtnummer" => "KL124",
//       "luchthaven" => "Schiphol",
//       "gate" => "A1",
//       "detailpagina" => "medewerker-vluchtdetails.php?vluchtnummer=" . $vluchtnummer,
//       "bestemming" => "Madrid",
//       "maatschappij" => "KLM",
//       "bagage" => "25kg"
//     ),
//     "KL125" => array(
//       "datum" => "02-05-2023 09:00",
//       "vluchtnummer" => "KL125",
//       "luchthaven" => "Schiphol",
//       "gate" => "A1",
//       "detailpagina" => "medewerker-vluchtdetails.php?vluchtnummer=" . $vluchtnummer,
//       "bestemming" => "Madrid",
//       "maatschappij" => "KLM",
//       "bagage" => "25kg"
//     ),
//     "KL126" => array(
//       "datum" => "03-05-2023 09:00",
//       "vluchtnummer" => "KL126",
//       "luchthaven" => "Schiphol",
//       "gate" => "A1",
//       "detailpagina" => "medewerker-vluchtdetails.php?vluchtnummer=" . $vluchtnummer,
//       "bestemming" => "Madrid",
//       "maatschappij" => "KLM",
//       "bagage" => "25kg"
//     ),
//   );

//   // Als er een vluchtnummer is opgegeven, retourneer alleen die vlucht, een lege array bij niet bestaande vlucht.
//   if ($vluchtnummer !== null) {
//     if (isset($vluchten[$vluchtnummer])) {
//       $vluchten = array($vluchtnummer => $vluchten[$vluchtnummer]);
//     } else {
//       // Als het vluchtnummer niet in de array bestaat, retourneer een lege array
//       $vluchten = array();
//     }
//   }

// // Een array met kolomdefinities voor verschillende pagina types
// $kolommen = array(
//   'vluchtenMw' => ['datum', 'vluchtnummer', 'luchthaven', 'gate', 'detailpagina'],
//   'vluchtenPa' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij', 'bagage'],
//   'vluchtenOv' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij']
// );

// $kolomDefinities = $kolommen[$paginaType] ?? null; // Zorg voor een standaard waarde als de sleutel niet bestaat

// return array($vluchten, $kolomDefinities);

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
      if ($kolom == 'detailpagina') {
        $detailpagina = 'medewerker-vluchtdetails.php?vluchtnummer=' . $vlucht['vluchtnummer'];
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
        $vluchtnummer = $_POST["vluchtnummer"];
        $vluchten = haalVluchten($vluchtnummer);
        // Als er geen vluchten worden geretourneerd, maak een foutmelding
        if (empty($vluchten)) {
            $foutmelding = "Er zijn geen vluchten gevonden met het opgegeven vluchtnummer.";
        }
    } else {
        $vluchten = haalVluchten(null);
    }

    // Een array met kolomdefinities voor verschillende pagina types
    $kolommen = array(
        'vluchtenMw' => ['datum', 'vluchtnummer', 'luchthaven', 'gate', 'detailpagina'],
        'vluchtenPa' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij', 'bagage'],
        'vluchtenOv' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij']
    );

    $kolomDefinities = $kolommen[$paginaType] ?? null; // Zorg voor een standaardwaarde als de sleutel niet bestaat

    return array($vluchten, $kolomDefinities, $foutmelding);
}
?>