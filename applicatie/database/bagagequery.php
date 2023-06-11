<?php

require_once 'db_connectie.php';

function haalPassagierBagage($passagiernummer)
{
    global $verbinding;

    $sql = "SELECT BagageObject.*, Passagier.vluchtnummer AS Vluchtnummer
            FROM BagageObject
            INNER JOIN Passagier ON BagageObject.passagiernummer = Passagier.passagiernummer
            WHERE BagageObject.passagiernummer = :passagiernummer";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindValue(':passagiernummer', $passagiernummer, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Groepeer de resultaten op basis van objectvolgnummer
    $bagage = array();
    foreach ($result as $row) {
        $objectvolgnummer = $row['objectvolgnummer'];
        if (!isset($bagage[$objectvolgnummer])) {
            $bagage[$objectvolgnummer] = array(
                'objectvolgnummer' => $objectvolgnummer,
                'gewicht' => $row['gewicht'],
                'vluchtnummers' => array()
            );
        }
        $bagage[$objectvolgnummer]['vluchtnummers'][] = $row['Vluchtnummer'];
    }

    return array_values($bagage);
}

function haalBagageOpVluchtnummer($vluchtnummer, $passagiernummer)
{
    global $verbinding;

    $sql = "SELECT BagageObject.*, Passagier.vluchtnummer AS Vluchtnummer
            FROM BagageObject
            INNER JOIN Passagier ON BagageObject.passagiernummer = Passagier.passagiernummer
            WHERE Passagier.vluchtnummer = :vluchtnummer AND Passagier.passagiernummer = :passagiernummer";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([
        ':vluchtnummer' => $vluchtnummer,
        ':passagiernummer' => $passagiernummer
    ]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $bagage = array();
    foreach ($result as $row) {
        $objectvolgnummer = $row['objectvolgnummer'];
        if (!isset($bagage[$objectvolgnummer])) {
            $bagage[$objectvolgnummer] = array(
                'objectvolgnummer' => $objectvolgnummer,
                'gewicht' => $row['gewicht'],
                'vluchtnummers' => array()
            );
        }
        $bagage[$objectvolgnummer]['vluchtnummers'][] = $row['Vluchtnummer'];
    }

    return array_values($bagage);
}
?>