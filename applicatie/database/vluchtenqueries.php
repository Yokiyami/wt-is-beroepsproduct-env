<?php
require_once './database/db_connectie.php';

function haalVluchten($vluchtnummer = null, $offset = 0, $limiet = 10)
{
    global $verbinding;

    if ($vluchtnummer !== null) {
        $sql = "SELECT TOP 1 Vlucht.vluchtnummer AS Vluchtnummer, Vlucht.vertrektijd AS Datum, Vlucht.gatecode AS Gate, Vlucht.bestemming AS Bestemming, Vlucht.maatschappijcode AS Maatschappij, Vlucht.max_aantal AS 'Max aantal', Luchthaven.luchthavencode AS Luchthaven, BagageObject.gewicht AS Gewicht 
        FROM Vlucht 
        LEFT JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode 
        LEFT JOIN Passagier ON Passagier.vluchtnummer = Vlucht.vluchtnummer
        LEFT JOIN BagageObject ON BagageObject.passagiernummer = Passagier.passagiernummer 
        WHERE Vlucht.vluchtnummer = :vluchtnummer";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':vluchtnummer' => $vluchtnummer]);
    } else {
        $sql = "SELECT Vlucht.vluchtnummer AS Vluchtnummer, Vlucht.vertrektijd AS Datum, Vlucht.gatecode AS Gate, Vlucht.bestemming AS Bestemming, Vlucht.maatschappijcode AS Maatschappij, Vlucht.max_aantal AS 'Max aantal', Luchthaven.luchthavencode AS Luchthaven, BagageObject.gewicht AS Gewicht 
        FROM Vlucht 
        LEFT JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode 
        LEFT JOIN Passagier ON Passagier.vluchtnummer = Vlucht.vluchtnummer
        LEFT JOIN BagageObject ON BagageObject.passagiernummer = Passagier.passagiernummer 
        ORDER BY Vlucht.vluchtnummer
        OFFSET :offset ROWS FETCH NEXT :limiet ROWS ONLY";
        $stmt = $verbinding->prepare($sql);
        $stmt->bindValue(':offset', intval($offset), PDO::PARAM_INT);
        $stmt->bindValue(':limiet', intval($limiet), PDO::PARAM_INT);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>