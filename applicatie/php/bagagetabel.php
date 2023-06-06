<?php

///////////////////////////////////////////////////////////////////////////////BAGAGETABEL////////////////////////////////////////////////////////////////////////////////////
// Functie om vooraf gedefinieerde bagage op te halen
function haalBagage($objectnummer = null)
{
  $bagage = array(
    "OBJ001" => array(
      "objectnummer" => "OBJ001",
      "vluchtnummer" => "KL123",
      "passagiernummer" => "PAS001",
      "bagage" => "25 kg"
    ),
    "OBJ002" => array(
      "objectnummer" => "OBJ002",
      "vluchtnummer" => "KL124",
      "passagiernummer" => "PAS002",
      "bagage" => "20 kg"
    ),
    // ...
  );

  // Als er een objectnummer is opgegeven, retourneer alleen die bagage, een lege array bij niet bestaande bagage.
  if ($objectnummer !== null) {
    if (isset($bagage[$objectnummer])) {
      $bagage = array($objectnummer => $bagage[$objectnummer]);
    } else {
      // Als het objectnummer niet in de array bestaat, retourneer een lege array
      $bagage = array();
    }
  }

  return $bagage;
}

// Functie om een HTML tabel te genereren uit de gegeven bagage data
function genereerBagageTabel($bagage)
{
  $kolommen = ['objectnummer', 'vluchtnummer', 'passagiernummer', 'bagage'];
  $html = '<table class="tabel"><thead><tr>';

  // Headers genereren
  foreach ($kolommen as $kolom) {
    $html .= "<th>{$kolom}</th>";
  }

  $html .= '</tr></thead><tbody>';

  // Rijen genereren
  foreach ($bagage as $item) {
    $html .= '<tr>';
    foreach ($kolommen as $kolom) {
      $html .= '<td data-label="' . $kolom . '">' . $item[$kolom] . '</td>';
    }
    $html .= '</tr>';
  }

  $html .= '</tbody></table>';

  return $html;
}

// Functie om bagage data op te halen op basis van de gegeven POST request
function vulBagage()
{
  $bagage = array();
  $foutmelding = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["objectnummer"])) {
    $bagage = haalBagage($_POST["objectnummer"]);
    // Als er geen bagage wordt geretourneerd, maak een foutmelding
    if (empty($bagage)) {
      $foutmelding = "Er is geen bagage gevonden met het opgegeven objectnummer.";
    }
  } else {
    $bagage = haalBagage(null);
  }

  return array($bagage, $foutmelding);
}

?>