<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once './database/vluchten-tabel-sql.php';
include_once './php/veiligheid.php';

// Genereer een nieuwe CSRF token
$csrf_token = generateCSRFToken();

// Valideer de CSRF token
validateCSRFToken($csrf_token);

// Functie om een HTML tabel te genereren uit de gegeven vluchten data en kolommen
function genereerTabel($vluchten, $kolommen, $paginaType)
{
  $html = '<table class="tabel"><thead><tr>';

  // Headers genereren
  foreach ($kolommen as $kolom) {
    if ($paginaType === 'medewerker-vluchtenoverzicht.php') {
      if ($kolom === 'Vluchtnummer') {
        $html .= "<th><a href=\"?sorteerOp=Vluchtnummer\">{$kolom}</a></th>";
      } elseif ($kolom === 'Datum') {
        $html .= "<th><a href=\"?sorteerOp=Vertrektijd\">{$kolom}</a></th>";
      } elseif ($kolom === 'Luchthaven') {
        $html .= "<th><a href=\"?sorteerOp=Luchthavencode\">{$kolom}</a></th>";
      } else {
        $html .= "<th>{$kolom}</th>";
      }
    } else {
      $html .= "<th>{$kolom}</th>";
    }
  }

  $html .= '</tr></thead><tbody>';

  // Rijen genereren
  foreach ($vluchten as $vlucht) {
    $html .= '<tr>';
    foreach ($kolommen as $kolom) {
      if ($kolom == 'Detailpagina') {
        $detailpagina = 'medewerker-vluchtdetails.php?vluchtnummer=' . $vlucht['Vluchtnummer'];
        $html .= '<td data-label="' . $kolom . '"><a href="' . $detailpagina . '" class="button-link"><span class="button-text">Details</span></a></td>';
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
function vulVluchten($paginaType = null, $start = 0, $pagesize = 10)
{
  global $verbinding;

  $vluchten = array();
  $kolommen = array();
  $foutmelding = null;
  $passagiernummer = isset($_SESSION['username']) ? ontsmet($_SESSION['username']) : 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
    $vluchtnummer = ontsmet($_POST["vluchtnummer"]);
    $start = 0; 
  } else {
    $vluchtnummer = null;
  }

  if ($passagiernummer !== null && $paginaType === 'vluchtenPa') {
    $vluchten = haalPassagierVluchten($passagiernummer, $start, $pagesize);
  } else if ($paginaType === 'vluchtenDt') {
    $vluchtnummer = ontsmet($_GET["vluchtnummer"]);
    $vluchten = array(haalVluchtDetails($vluchtnummer));
  } else {
    $vluchten = haalVluchten($vluchtnummer, $start, $pagesize);
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

// Maakt een pager
function genereerPager($url, $start, $pagesize) {
  $pageback = $start - $pagesize;
  $pageback = $pageback < 0 ? 0 : $pageback;
  $totalrows = ontsmet(getAantalVluchten()[0]["count"]);

  $pagefw = $start + $pagesize;
  $pagefw = $pagefw > $totalrows ? $start : $pagefw;

  $result = "<div class='button-container'><a href='$url?pagesize=$pagesize&start=$pageback' class='button-link'>
  <span class='button-text'>Vorige</span></a>
  <a href='$url?pagesize=$pagesize&start=$pagefw' class='button-link'>
  <span class='button-text'>Volgende</span></a>
  </div>";

  return $result;
}

?>