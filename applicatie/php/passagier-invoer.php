<?php

require_once './database/db_connectie.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["naam"]) && isset($_POST["passagiernummer"]) && isset($_POST["vluchtnummer"]) && isset($_POST["stoel"]) && isset($_POST["geslacht"])) {

    global $verbinding;

    $naam = $_POST["naam"];
    $passagiernummer = $_POST["passagiernummer"];
    $stoelnummer = $_POST["stoel"];
    $geslacht = $_POST["geslacht"];
    $vluchtnummer = $_POST["vluchtnummer"];

    // Maak een prepared statement
    $stmt = $verbinding->prepare("INSERT INTO Passagier (naam, passagiernummer, vluchtnummer, stoel, geslacht) VALUES (:naam, :passagiernummer, :vluchtnummer, :stoel, :geslacht)");

    // Bind de variabelen aan de parameters
    $stmt->bindValue(':naam', $naam);
    $stmt->bindValue(':passagiernummer', $passagiernummer);
    $stmt->bindValue(':vluchtnummer', $vluchtnummer);
    $stmt->bindValue(':stoel', $stoelnummer);
    $stmt->bindValue(':geslacht', $geslacht);

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