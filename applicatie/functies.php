<?php

//Getters voor dropdown navbars
if (isset($_GET['pagina'])) {
  $selectedPage = $_GET['pagina'];
  header("Location: $selectedPage");
  exit;
}

if (isset($_GET['login-als'])) {
  $selectedPage = $_GET['login-als'];
  header("Location: $selectedPage");
  exit;
}

// Functie om vooraf gedefinieerde vluchten op te halen
function haalVluchten($vluchtnummer = null, $paginaType = null)
{
  $vluchten = array(
    "KL124" => array(
      "datum" => "01-05-2023 09:00",
      "vluchtnummer" => "KL124",
      "luchthaven" => "Schiphol",
      "gate" => "A1",
      "detailpagina" => "medewerker-vluchtdetails.php",
      "bestemming" => "Madrid",
      "maatschappij" => "KLM",
      "bagage" => "25kg"
    ),
    "KL125" => array(
      "datum" => "02-05-2023 09:00",
      "vluchtnummer" => "KL125",
      "luchthaven" => "Schiphol",
      "gate" => "A1",
      "detailpagina" => "medewerker-vluchtdetails.php",
      "bestemming" => "Madrid",
      "maatschappij" => "KLM",
      "bagage" => "25kg"
    ),
    "KL126" => array(
      "datum" => "03-05-2023 09:00",
      "vluchtnummer" => "KL126",
      "luchthaven" => "Schiphol",
      "gate" => "A1",
      "detailpagina" => "medewerker-vluchtdetails.php",
      "bestemming" => "Madrid",
      "maatschappij" => "KLM",
      "bagage" => "25kg"
    ),
  );

  // Een array met kolomdefinities voor verschillende pagina types
  $kolommen = array(
    'vluchtenMw' => ['datum', 'vluchtnummer', 'luchthaven', 'gate', 'detailpagina'],
    'vluchtenPa' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij', 'bagage'],
    'vluchtenOv' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij']
  );

  return array($vluchten, $kolommen[$paginaType]);
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
      if ($kolom == 'detailpagina') {
        $html .= '<td data-label="' . $kolom . '"><a href="' . $vlucht[$kolom] . '"><button>Details</button></a></td>';
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
  $vluchten = array();
  $kolommen = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
    list($vluchten, $kolommen) = haalVluchten($_POST["vluchtnummer"], $paginaType);
  } else {
    list($vluchten, $kolommen) = haalVluchten(null, $paginaType);
  }

  return array($vluchten, $kolommen);
}