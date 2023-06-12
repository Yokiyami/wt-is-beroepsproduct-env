<?php

require_once './database/db_connectie.php';
require_once './database/passagier-invoer-sql.php'; 
require_once './php/veiligheid.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideer de CSRF-token
    if (!validateCSRFToken($_POST['csrf_token'])) {
        die("Ongeldige CSRF-token.");
    }

    if (isset($_POST["naam"]) && isset($_POST["passagiernummer"]) && isset($_POST["vluchtnummer"]) 
        && isset($_POST["stoel"]) && isset($_POST["geslacht"])) {

        $naam = ontsmet($_POST["naam"]);
        $passagiernummer = ontsmet($_POST["passagiernummer"]);
        $stoelnummer = ontsmet($_POST["stoel"]);
        $geslacht = ontsmet($_POST["geslacht"]);
        $vluchtnummer = ontsmet($_POST["vluchtnummer"]);

        if (insertPassenger($naam, $passagiernummer, $vluchtnummer, $stoelnummer, $geslacht)) {
            echo "Nieuwe record succesvol toegevoegd.";
        } else {
            echo "Fout bij het toevoegen van het nieuwe record.";
        }
    }
}
?>
