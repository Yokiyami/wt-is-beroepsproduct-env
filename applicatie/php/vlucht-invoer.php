<?php

require_once './database/db_connectie.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"]) && isset($_POST["bestemming"]) 
&& isset($_POST["gatecode"]) && isset($_POST["maatschappijcode"]) && isset($_POST["datum"]) && isset($_POST["tijd"]) 
&& isset($_POST["max_aantal"]) && isset($_POST["max_gewicht_pp"]) && isset($_POST["max_totaalgewicht"])) {

    global $verbinding;

    $vluchtnummer = $_POST["vluchtnummer"];
    $bestemming = $_POST["bestemming"];
    $gatecode = $_POST["gatecode"];
    $maatschappijcode = $_POST["maatschappijcode"];
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];
    $max_aantal = $_POST["max_aantal"];
    $max_gewicht_pp = $_POST["max_gewicht_pp"];
    $max_totaalgewicht = $_POST["max_totaalgewicht"];

    // Combineer datum en tijd tot één datetime voor de database
    $vertrektijd = $datum . ' ' . $tijd;

    // Maak een prepared statement
    $stmt = $verbinding->prepare("INSERT INTO Vlucht (vluchtnummer, bestemming, gatecode, vertrektijd, maatschappijcode, max_aantal, max_gewicht_pp, max_totaalgewicht) 
    VALUES (:vluchtnummer, :bestemming, :gatecode, :vertrektijd, :maatschappijcode, :max_aantal, :max_gewicht_pp, :max_totaalgewicht)");

    // Bind de variabelen aan de parameters
    $stmt->bindValue(':vluchtnummer', $vluchtnummer);
    $stmt->bindValue(':bestemming', $bestemming);
    $stmt->bindValue(':gatecode', $gatecode);
    $stmt->bindValue(':vertrektijd', $vertrektijd);
    $stmt->bindValue(':maatschappijcode', $maatschappijcode);
    $stmt->bindValue(':max_aantal', $max_aantal);
    $stmt->bindValue(':max_gewicht_pp', $max_gewicht_pp);
    $stmt->bindValue(':max_totaalgewicht', $max_totaalgewicht);

    // Voer de statement uit
    if ($stmt->execute()) {
        echo "Nieuwe record succesvol toegevoegd.";
    } else {
        echo "Fout: " . implode(":", $stmt->errorInfo());
    }

    // Sluit de statement
    $stmt = null;
}

// Sluit de database connectie
$verbinding = null;

?>
