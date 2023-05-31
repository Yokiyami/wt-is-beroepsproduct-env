<?php
require_once 'db_connectie.php';

function haalPassagiers($passagiernummer = null)
{
    global $verbinding;

    if ($passagiernummer !== null) {
        $sql = "SELECT * FROM Passagier WHERE passagiernummer = :passagiernummer";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':passagiernummer' => $passagiernummer]);
    } else {
        $sql = "SELECT * FROM Passagier";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
