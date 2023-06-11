<?php

require_once './database/db_connectie.php';

function insertPassenger($naam, $passagiernummer, $vluchtnummer, $stoelnummer, $geslacht)
{
    global $verbinding;

    $stmt = $verbinding->prepare("INSERT INTO Passagier (naam, passagiernummer, vluchtnummer, stoel, geslacht) VALUES (:naam, :passagiernummer, :vluchtnummer, :stoel, :geslacht)");

    $stmt->bindValue(':naam', $naam);
    $stmt->bindValue(':passagiernummer', $passagiernummer);
    $stmt->bindValue(':vluchtnummer', $vluchtnummer);
    $stmt->bindValue(':stoel', $stoelnummer);
    $stmt->bindValue(':geslacht', $geslacht);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

?>
