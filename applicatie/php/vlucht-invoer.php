<?php

require_once './database/vlucht-invoer-sql.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vluchtnummer"]) && isset($_POST["bestemming"]) 
&& isset($_POST["gatecode"]) && isset($_POST["maatschappijcode"]) && isset($_POST["datum"]) && isset($_POST["tijd"]) 
&& isset($_POST["max_aantal"]) && isset($_POST["max_gewicht_pp"]) && isset($_POST["max_totaalgewicht"])) {

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

    if (insertFlight($vluchtnummer, $bestemming, $gatecode, $vertrektijd, $maatschappijcode, $max_aantal, $max_gewicht_pp, $max_totaalgewicht)) {
        echo "Nieuwe record succesvol toegevoegd.";
    } else {
        echo "Fout bij het toevoegen van de record.";
    }
}

?>