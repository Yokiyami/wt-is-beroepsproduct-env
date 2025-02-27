<?php
require_once 'db_connectie.php';

function checkin_passenger($passagiernummer, $vluchtnummer, $gewicht, $objectvolgnummer, $balienummer, $verbinding)
{
    // Het inchecken moet conform de tabel IncheckenVlucht (dus de combinatie balienummer/vluchtnummer moet kunnen).
    $stmt = $verbinding->prepare("SELECT * FROM IncheckenVlucht WHERE vluchtnummer = :vluchtnummer AND balienummer = :balienummer");
    $stmt->execute(['vluchtnummer' => $vluchtnummer, 'balienummer' => $balienummer]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("De combinatie van balienummer en vluchtnummer is niet toegestaan volgens de IncheckenVlucht tabel.");
    }

    // Haal informatie op over de vlucht
    $stmt = $verbinding->prepare("SELECT * FROM Vlucht WHERE vluchtnummer = :vluchtnummer");
    $stmt->execute(['vluchtnummer' => $vluchtnummer]);
    $vlucht = $stmt->fetch();

    // Controleer het aantal reeds ingecheckte passagiers voor de vlucht
    $stmt = $verbinding->prepare("SELECT COUNT(*) as ingecheckte_passagiers FROM Passagier WHERE vluchtnummer = :vluchtnummer");
    $stmt->execute(['vluchtnummer' => $vluchtnummer]);
    $ingecheckte_passagiers = $stmt->fetchColumn();

    if ($ingecheckte_passagiers >= $vlucht['max_aantal']) {
        throw new Exception("Het maximale aantal passagiers voor deze vlucht is bereikt.");
    }

    // Het gewicht van de bagage mag er niet voor zorgen dat max_gewicht_pp en max_totaalgewicht van de vlucht wordt overschreden.
    $stmt = $verbinding->prepare("SELECT SUM(gewicht) as totaal_gewicht FROM BagageObject WHERE passagiernummer = :passagiernummer");
    $stmt->execute(['passagiernummer' => $passagiernummer]);
    $totaal_gewicht = $stmt->fetchColumn();

    if ($gewicht > $vlucht['max_gewicht_pp'] || $totaal_gewicht + $gewicht > $vlucht['max_totaalgewicht']) {
        throw new Exception("Het gewicht van de bagage overschrijdt het maximale toegestane gewicht.");
    }

    // Het moet een al bestaande passagier inclusief zijn bagage inchecken op een vlucht.
    $stmt = $verbinding->prepare("INSERT INTO BagageObject (passagiernummer, objectvolgnummer, gewicht) VALUES (:passagiernummer, :objectvolgnummer, :gewicht)");
    $stmt->execute(['passagiernummer' => $passagiernummer, 'objectvolgnummer' => $objectvolgnummer, 'gewicht' => $gewicht]);

    $stmt = $verbinding->prepare("UPDATE Passagier SET balienummer = :balienummer WHERE passagiernummer = :passagiernummer");
    $stmt->execute(['passagiernummer' => $passagiernummer, 'balienummer' => $balienummer]);
}

function checkin_zelf($passagiernummer, $vluchtnummer, $objectvolgnummers, $gewichten, $verbinding)
{
    $stmt = $verbinding->prepare("SELECT * FROM Vlucht WHERE vluchtnummer = :vluchtnummer");
    $stmt->execute(['vluchtnummer' => $vluchtnummer]);
    $vlucht = $stmt->fetch();

    $totaal_gewicht = array_sum($gewichten);

    if ($totaal_gewicht > $vlucht['max_gewicht_pp'] || $totaal_gewicht > $vlucht['max_totaalgewicht']) {
        throw new Exception("Het gewicht van de bagage overschrijdt het maximale toegestane gewicht.");
    }

    // Controleer het aantal reeds ingecheckte passagiers voor de vlucht
    $stmt = $verbinding->prepare("SELECT COUNT(*) as ingecheckte_passagiers FROM Passagier WHERE vluchtnummer = :vluchtnummer");
    $stmt->execute(['vluchtnummer' => $vluchtnummer]);
    $ingecheckte_passagiers = $stmt->fetchColumn();

    if ($ingecheckte_passagiers >= $vlucht['max_aantal']) {
        throw new Exception("Het maximale aantal passagiers voor deze vlucht is bereikt.");
    }

    foreach ($objectvolgnummers as $index => $objectvolgnummer) {
        $gewicht = $gewichten[$index];

        $stmt = $verbinding->prepare("SELECT * FROM BagageObject WHERE passagiernummer = :passagiernummer AND objectvolgnummer = :objectvolgnummer");
        $stmt->execute(['passagiernummer' => $passagiernummer, 'objectvolgnummer' => $objectvolgnummer]);

        if ($stmt->rowCount() > 0) {
            throw new Exception("De combinatie van passagiernummer en objectvolgnummer bestaat al.");
        }

        $stmt = $verbinding->prepare("INSERT INTO BagageObject (passagiernummer, objectvolgnummer, gewicht) VALUES (:passagiernummer, :objectvolgnummer, :gewicht)");
        $stmt->execute(['passagiernummer' => $passagiernummer, 'objectvolgnummer' => $objectvolgnummer, 'gewicht' => $gewicht]);
    }
}
?>