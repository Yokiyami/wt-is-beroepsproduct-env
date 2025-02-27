<?php
require_once './database/checkin-sql.php';
require_once './php/veiligheid.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valideer de CSRF-token
    if (!validateCSRFToken($_POST['csrf_token'])) {
        die('Invalid CSRF token');
    }
    
    $passagiernummer = ontsmet($_POST['passagiernummer']);
    $vluchtnummer = ontsmet($_POST['vluchtnummer']);
    $gewicht = ontsmet($_POST['gewicht']);
    $objectvolgnummer = ontsmet($_POST['objectvolgnummer']);
    $balienummer = ontsmet($_POST['balienummer']);

    // Controleer of de numerieke velden daadwerkelijk numeriek zijn en binnen een acceptabel bereik liggen
    if (!is_numeric($gewicht) || $gewicht < 0 || $gewicht > 9999.99) {
        die('Ongeldige waarde voor gewicht');
    }
    if (!is_numeric($passagiernummer) || $passagiernummer < 0) {
        die('Ongeldige waarde voor passagiernummer');
    }
    if (!is_numeric($balienummer) || $balienummer < 0 || $balienummer > 10) {
        die('Ongeldige waarde voor balienummer');
    }
    if (!is_numeric($objectvolgnummer) || $objectvolgnummer < 0) {
        die('Ongeldige waarde voor objectvolgnummer');
    }

    try {
        checkin_passenger($passagiernummer, $vluchtnummer, $gewicht, $objectvolgnummer, $balienummer, $verbinding);
        echo 'Passagier succesvol ingecheckt!';
    } catch (Exception $e) {
        echo 'Fout: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    }
}
?>
