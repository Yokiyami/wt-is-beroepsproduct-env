<?php

require_once './database/db_connectie.php';
require_once './database/passagier-invoer-sql.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["naam"]) && isset($_POST["passagiernummer"]) && isset($_POST["vluchtnummer"]) && isset($_POST["stoel"]) && isset($_POST["geslacht"])) {

    $naam = $_POST["naam"];
    $passagiernummer = $_POST["passagiernummer"];
    $stoelnummer = $_POST["stoel"];
    $geslacht = $_POST["geslacht"];
    $vluchtnummer = $_POST["vluchtnummer"];

    if (insertPassenger($naam, $passagiernummer, $vluchtnummer, $stoelnummer, $geslacht)) {
        echo "Nieuwe record succesvol toegevoegd.";
    } else {
        echo "Fout bij het toevoegen van het nieuwe record.";
    }
}
?>
