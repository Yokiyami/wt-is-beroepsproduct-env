<?php

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

?>