<?php
require_once 'db_connectie.php';

function haalPassagiers($passagiernummer = null, $offset = 0, $limiet = 10)
{
    global $verbinding;

    if ($passagiernummer !== null) {
        $sql = "SELECT TOP 1 passagiernummer, naam, stoel, geslacht FROM Passagier WHERE passagiernummer = :passagiernummer";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':passagiernummer' => $passagiernummer]);
    } else {
        $sql = "SELECT passagiernummer, naam, stoel, geslacht FROM Passagier ORDER BY passagiernummer OFFSET :offset ROWS FETCH NEXT :limiet ROWS ONLY";
        $stmt = $verbinding->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limiet', $limiet, PDO::PARAM_INT);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAantalPassagiers() {
    global $verbinding;
    $stmt = $verbinding->query("SELECT count(*) as count FROM Passagier");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
