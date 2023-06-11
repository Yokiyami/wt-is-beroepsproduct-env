<?php

require_once './database/db_connectie.php';

function insertFlight($vluchtnummer, $bestemming, $gatecode, $vertrektijd, $maatschappijcode, $max_aantal, $max_gewicht_pp, $max_totaalgewicht)
{
    global $verbinding;

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
        return true;
    } else {
        return false;
    }
}

?>
