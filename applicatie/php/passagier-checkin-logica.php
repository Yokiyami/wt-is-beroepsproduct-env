<?php
require_once './database/checkinquerie.php';
include_once './php/veiligheid.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('Invalid CSRF token');
    }

    $passagiernummer = ontsmet($_POST['passagiernummer']);

    // Controleer of de ingelogde gebruiker overeenkomt met het verstrekte passagiernummer
    if ($_SESSION['username'] != $passagiernummer) {
        die('U kunt alleen uw eigen bagage inchecken');
    }

    $vluchtnummer = ontsmet($_POST['vluchtnummer']);
    $objectvolgnummers = array_map('ontsmet', $_POST['objectvolgnummer']);
    $gewichten = array_map('ontsmet', $_POST['gewicht']);

    // Verwijder lege waarden uit de arrays
    $objectvolgnummers = array_filter($objectvolgnummers);
    $gewichten = array_filter($gewichten);

    // Controleer of de numerieke velden daadwerkelijk numeriek zijn en binnen een acceptabel bereik liggen
    if (!is_numeric($passagiernummer) || $passagiernummer < 0) {
        die('Ongeldige waarde voor passagiernummer');
    }
    if (!all_numeric($objectvolgnummers) || !all_positive($objectvolgnummers)) {
        die('Ongeldige waarden voor objectvolgnummers');
    }
    if (!all_numeric($gewichten) || !all_positive($gewichten)) {
        die('Ongeldige waarden voor gewichten');
    }

    try {
        checkin_zelf($passagiernummer, $vluchtnummer, $objectvolgnummers, $gewichten, $verbinding);
        echo 'Bagage succesvol ingecheckt!';
    } catch (Exception $e) {
        echo 'Fout: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
}

// Check of alle waarden in een array numeriek zijn
function all_numeric($array) {
    foreach($array as $value) {
        if (!is_numeric($value)) {
            return false;
        }
    }
    return true;
}

// Check of alle waarden in een array positief zijn
function all_positive($array) {
    foreach($array as $value) {
        if ($value < 0) {
            return false;
        }
    }
    return true;
}
?>