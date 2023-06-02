<?php
require_once 'db_connectie.php';

function haalVluchten($vluchtnummer = null, $offset = 0, $limiet = 10)
{
    global $verbinding;

    if ($vluchtnummer !== null) {
        $sql = "SELECT TOP 1 Vlucht.vertrektijd AS datum, Vlucht.vluchtnummer, Luchthaven.luchthavencode, Vlucht.gatecode AS gate, Luchthaven.naam AS luchthaven, Vlucht.bestemming, Vlucht.maatschappijcode AS maatschappij, BagageObject.gewicht 
                FROM Vlucht 
                INNER JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode 
                INNER JOIN Passagier ON Passagier.vluchtnummer = Vlucht.vluchtnummer
                INNER JOIN BagageObject ON BagageObject.passagiernummer = Passagier.passagiernummer 
                WHERE Vlucht.vluchtnummer = :vluchtnummer";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':vluchtnummer' => $vluchtnummer]);
    } else {
        $sql = "SELECT Vlucht.vertrektijd AS datum, Vlucht.vluchtnummer, Luchthaven.luchthavencode, Vlucht.gatecode AS gate, Luchthaven.naam AS luchthaven, Vlucht.bestemming, Vlucht.maatschappijcode AS maatschappij, BagageObject.gewicht 
                FROM Vlucht 
                INNER JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode 
                INNER JOIN Passagier ON Passagier.vluchtnummer = Vlucht.vluchtnummer
                INNER JOIN BagageObject ON BagageObject.passagiernummer = Passagier.passagiernummer 
                ORDER BY Vlucht.vluchtnummer OFFSET :offset ROWS FETCH NEXT :limiet ROWS ONLY";
        $stmt = $verbinding->prepare($sql);
        $stmt->bindValue(':offset', intval($offset), PDO::PARAM_INT);
        $stmt->bindValue(':limiet', intval($limiet), PDO::PARAM_INT);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>