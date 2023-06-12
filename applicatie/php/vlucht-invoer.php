<?php

require_once './database/vlucht-invoer-sql.php';
require_once './php/veiligheid.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valideer de CSRF-token
    if (!validateCSRFToken($_POST['csrf_token'])) {
        die("Ongeldige CSRF-token.");
    }

    if (
        isset($_POST["vluchtnummer"]) && isset($_POST["bestemming"])
        && isset($_POST["gatecode"]) && isset($_POST["maatschappijcode"])
        && isset($_POST["datum"]) && isset($_POST["tijd"])
        && isset($_POST["max_aantal"]) && isset($_POST["max_gewicht_pp"])
        && isset($_POST["max_totaalgewicht"])
        && isset($_POST["balienummer"])
    ) {

        $vluchtnummer = ontsmet($_POST["vluchtnummer"]);
        $bestemming = ontsmet($_POST["bestemming"]);
        $gatecode = ontsmet($_POST["gatecode"]);
        $maatschappijcode = ontsmet($_POST["maatschappijcode"]);
        $datum = ontsmet($_POST["datum"]);
        $tijd = ontsmet($_POST["tijd"]);
        $max_aantal = ontsmet($_POST["max_aantal"]);
        $max_gewicht_pp = ontsmet($_POST["max_gewicht_pp"]);
        $max_totaalgewicht = ontsmet($_POST["max_totaalgewicht"]);
        $balienummer = ontsmet($_POST["balienummer"]);

        // Combineer datum en tijd tot één datetime voor de database
        $vertrektijd = $datum . ' ' . $tijd;

        if (voegVluchtToe($vluchtnummer, $bestemming, $gatecode, $vertrektijd, $maatschappijcode, $max_aantal, $max_gewicht_pp, $max_totaalgewicht, $balienummer)) {
            echo "Nieuwe record succesvol toegevoegd.";
        } else {
            echo "Fout bij het toevoegen van de record.";
        }
    }
}

?>