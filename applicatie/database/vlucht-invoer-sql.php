<?php

require_once './database/db_connectie.php';

function voegVluchtToe($vluchtnummer, $bestemming, $gatecode, $vertrektijd, $maatschappijcode, $max_aantal, $max_gewicht_pp, $max_totaalgewicht, $balienummer)
{
    global $verbinding;

    $stmt = $verbinding->prepare("INSERT INTO Vlucht (vluchtnummer, bestemming, gatecode, vertrektijd, maatschappijcode, max_aantal, max_gewicht_pp, max_totaalgewicht) 
    VALUES (:vluchtnummer, :bestemming, :gatecode, :vertrektijd, :maatschappijcode, :max_aantal, :max_gewicht_pp, :max_totaalgewicht)");

    $stmt->bindValue(':vluchtnummer', $vluchtnummer);
    $stmt->bindValue(':bestemming', $bestemming);
    $stmt->bindValue(':gatecode', $gatecode);
    $stmt->bindValue(':vertrektijd', $vertrektijd);
    $stmt->bindValue(':maatschappijcode', $maatschappijcode);
    $stmt->bindValue(':max_aantal', $max_aantal);
    $stmt->bindValue(':max_gewicht_pp', $max_gewicht_pp);
    $stmt->bindValue(':max_totaalgewicht', $max_totaalgewicht);

    if (!$stmt->execute()) {
        return false;
    }

    $stmt2 = $verbinding->prepare("INSERT INTO IncheckenVlucht (vluchtnummer, balienummer) 
    VALUES (:vluchtnummer, :balienummer)");

    $stmt2->bindValue(':vluchtnummer', $vluchtnummer);
    $stmt2->bindValue(':balienummer', $balienummer);

    if ($stmt2->execute()) {
        return true;
    } else {
        return false;
    }
}

?>
