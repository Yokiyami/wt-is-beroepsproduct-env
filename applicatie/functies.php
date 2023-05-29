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

//Getter voor vluchtdetails
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
function haalVluchten($vluchtnummer = null, $paginaType = null)
{
  $vluchten = array(
    "KL124" => array(
      "datum" => "01-05-2023 09:00",
      "vluchtnummer" => "KL124",
      "luchthaven" => "Schiphol",
      "gate" => "A1",
      "detailpagina" => "medewerker-vluchtdetails.php?vluchtnummer=" . $vluchtnummer,
      "bestemming" => "Madrid",
      "maatschappij" => "KLM",
      "bagage" => "25kg"
    ),
    "KL125" => array(
      "datum" => "02-05-2023 09:00",
      "vluchtnummer" => "KL125",
      "luchthaven" => "Schiphol",
      "gate" => "A1",
      "detailpagina" => "medewerker-vluchtdetails.php?vluchtnummer=" . $vluchtnummer,
      "bestemming" => "Madrid",
      "maatschappij" => "KLM",
      "bagage" => "25kg"
    ),
    "KL126" => array(
      "datum" => "03-05-2023 09:00",
      "vluchtnummer" => "KL126",
      "luchthaven" => "Schiphol",
      "gate" => "A1",
      "detailpagina" => "medewerker-vluchtdetails.php?vluchtnummer=" . $vluchtnummer,
      "bestemming" => "Madrid",
      "maatschappij" => "KLM",
      "bagage" => "25kg"
    ),
  );

  // Als er een vluchtnummer is opgegeven, retourneer alleen die vlucht, een lege array bij niet bestaande vlucht.
  if ($vluchtnummer !== null) {
    if (isset($vluchten[$vluchtnummer])) {
      $vluchten = array($vluchtnummer => $vluchten[$vluchtnummer]);
    } else {
      // Als het vluchtnummer niet in de array bestaat, retourneer een lege array
      $vluchten = array();
    }
  }

  // Een array met kolomdefinities voor verschillende pagina types
  $kolommen = array(
    'vluchtenMw' => ['datum', 'vluchtnummer', 'luchthaven', 'gate', 'detailpagina'],
    'vluchtenPa' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij', 'bagage'],
    'vluchtenOv' => ['datum', 'vluchtnummer', 'gate', 'bestemming', 'maatschappij']
  );

  $kolomDefinities = $kolommen[$paginaType] ?? null; // Zorg voor een standaard waarde als de sleutel niet bestaat

  return array($vluchten, $kolomDefinities);
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
  $foutmelding = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"])) {
    list($vluchten, $kolommen) = haalVluchten($_POST["vluchtnummer"], $paginaType);
    // Als er geen vluchten worden geretourneerd, maak een foutmelding
    if (empty($vluchten)) {
      $foutmelding = "Er zijn geen vluchten gevonden met het opgegeven vluchtnummer.";
    }
  } else {
    list($vluchten, $kolommen) = haalVluchten(null, $paginaType);
  }

  return array($vluchten, $kolommen, $foutmelding);
}

///////////////////////////////////////////////////////////////////////////PASSAGIERSTABEL////////////////////////////////////////////////////////////////////////////////////
// Functie om vooraf gedefinieerde passagiers op te halen
function haalPassagiers($passagiernummer = null)
{
  $passagiers = array(
    "PAS001" => array(
      "naam" => "Jan Jansen",
      "geslacht" => "Man",
      "passagiernummer" => "PAS001",
      "stoel" => "12A",
      "checkinpagina" => "medewerker-checkin.php"
    ),
    "PAS002" => array(
      "naam" => "Petra Pietersen",
      "geslacht" => "Vrouw",
      "passagiernummer" => "PAS002",
      "stoel" => "12B",
      "checkinpagina" => "medewerker-checkin.php"
    ),
    // ...
  );

  // Als er een passagiernummer is opgegeven, retourneer alleen die passagier, een lege array bij niet bestaande passagier.
  if ($passagiernummer !== null) {
    if (isset($passagiers[$passagiernummer])) {
      $passagiers = array($passagiernummer => $passagiers[$passagiernummer]);
    } else {
      // Als het passagiernummer niet in de array bestaat, retourneer een lege array
      $passagiers = array();
    }
  }

  return $passagiers;
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
      if ($kolom == 'checkinpagina') {
        $html .= '<td data-label="' . $kolom . '"><a href="' . $passagier[$kolom] . '"><button>Check-in</button></a></td>';
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

/////////////////////////////////////////////////////////////////////////////////PASSAGIER INVOEREN/////////////////////////////////////////////////////////////////////////
// Functie om een passagier toe te voegen aan de array van passagiers
function voegPassagierToe($passagiernummer, $naam, $stoelnummer, $geslacht) {
  global $passagiers;
  
  // Check of het passagiernummer al bestaat
  if (isset($passagiers[$passagiernummer])) {
      return "Het opgegeven passagiernummer bestaat al.";
  }

  // Voeg de nieuwe passagier toe aan de array
  $passagiers[$passagiernummer] = array(
      "naam" => $naam,
      "geslacht" => $geslacht,
      "passagiernummer" => $passagiernummer,
      "stoel" => $stoelnummer,
      "checkinpagina" => "medewerker-checkin.php"
  );

  return null;  // Geen foutmelding
}

// Haal de passagiergegevens uit het POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["naam"]) && isset($_POST["passagiernummer"]) && isset($_POST["stoelnummer"]) && isset($_POST["geslacht"])) {
  $naam = $_POST["naam"];
  $passagiernummer = $_POST["passagiernummer"];
  $stoelnummer = $_POST["stoelnummer"];
  $geslacht = $_POST["geslacht"];

  // Voeg de nieuwe passagier toe
  $foutmelding = voegPassagierToe($passagiernummer, $naam, $stoelnummer, $geslacht);

  // Controleer of er een fout is opgetreden
  if ($foutmelding !== null) {
      echo "<div class='foutmelding'>{$foutmelding}</div>";
  }
}
