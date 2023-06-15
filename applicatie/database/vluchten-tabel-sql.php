<?php
require_once './database/db_connectie.php';
include_once './php/veiligheid.php';

function haalVluchten($vluchtnummer = null, $offset = 0, $limiet = 10)
{
    global $verbinding;

    // Verkrijg de sorteerparameter uit het GET-verzoek
    $sorteerOp = ontsmet($_GET['sorteerOp'] ?? 'Vluchtnummer');

    // Toegestane kolommen voor sortering
    $toegestaneSorteerKolommen = ['Vluchtnummer', 'Vertrektijd', 'Luchthavencode'];

    // Controleer of de sorteerparameter geldig is
    if (!in_array($sorteerOp, $toegestaneSorteerKolommen)) {
        throw new InvalidArgumentException('Ongeldige sorteerparameter');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $vluchtnummer !== null) {
        $vluchtnummer = ontsmet($vluchtnummer);
        $sql = "SELECT TOP 1 Vlucht.vluchtnummer AS Vluchtnummer, Vlucht.vertrektijd AS Datum, Vlucht.gatecode AS Gate, Vlucht.bestemming AS Bestemming, 
        Vlucht.maatschappijcode AS Maatschappij, Vlucht.max_aantal AS 'Max aantal', Luchthaven.luchthavencode AS Luchthaven
        FROM Vlucht 
        LEFT JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode
        WHERE Vlucht.vluchtnummer = :vluchtnummer";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':vluchtnummer' => $vluchtnummer]);
    } else {
        $sql = "SELECT Vlucht.vluchtnummer AS Vluchtnummer, Vlucht.vertrektijd AS Datum, Vlucht.gatecode AS Gate, Vlucht.bestemming AS Bestemming, 
        Vlucht.maatschappijcode AS Maatschappij, Vlucht.max_aantal AS 'Max aantal', Luchthaven.luchthavencode AS Luchthaven
        FROM Vlucht 
        LEFT JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode
        ORDER BY $sorteerOp
        OFFSET :offset ROWS FETCH NEXT :limiet ROWS ONLY";
        $stmt = $verbinding->prepare($sql);
        $stmt->bindValue(':offset', intval($offset), PDO::PARAM_INT);
        $stmt->bindValue(':limiet', intval($limiet), PDO::PARAM_INT);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function haalPassagierVluchten($passagiernummer, $offset = 0, $limiet = 10)
{
    global $verbinding;

    $sql = "SELECT Vlucht.vluchtnummer AS Vluchtnummer, Vlucht.vertrektijd AS Datum, Vlucht.gatecode AS Gate, Vlucht.bestemming AS Bestemming, 
    Vlucht.maatschappijcode AS Maatschappij, Vlucht.max_aantal AS 'Max aantal', Luchthaven.luchthavencode AS Luchthaven, subquery.Bagage AS Bagage
    FROM Vlucht 
    INNER JOIN Passagier ON Vlucht.vluchtnummer = Passagier.vluchtnummer
    INNER JOIN (
        SELECT Passagier.passagiernummer, Passagier.vluchtnummer, MAX(BagageObject.gewicht) AS Bagage
        FROM Passagier
        INNER JOIN BagageObject ON Passagier.passagiernummer = BagageObject.passagiernummer
        GROUP BY Passagier.passagiernummer, Passagier.vluchtnummer
    ) AS subquery ON Passagier.passagiernummer = subquery.passagiernummer AND Vlucht.vluchtnummer = subquery.vluchtnummer
    LEFT JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode
    WHERE Passagier.passagiernummer = :passagiernummer
    ORDER BY Vlucht.vluchtnummer
    OFFSET :offset ROWS FETCH NEXT :limiet ROWS ONLY";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindValue(':passagiernummer', $passagiernummer, PDO::PARAM_INT);
    $stmt->bindValue(':offset', intval($offset), PDO::PARAM_INT);
    $stmt->bindValue(':limiet', intval($limiet), PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function haalVluchtDetails($vluchtnummer)
{
    $vluchtnummer = ontsmet($vluchtnummer);
    global $verbinding;

    $sql = "SELECT Vlucht.vluchtnummer AS Vluchtnummer, Vlucht.vertrektijd AS Datum, Vlucht.gatecode AS Gate, Vlucht.bestemming AS Bestemming,
    Vlucht.maatschappijcode AS Maatschappij, Vlucht.max_aantal AS 'Max aantal', Luchthaven.luchthavencode AS Luchthaven
    FROM Vlucht 
    LEFT JOIN Luchthaven ON Vlucht.bestemming = Luchthaven.luchthavencode
    WHERE Vlucht.vluchtnummer = :vluchtnummer";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindValue(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAantalVluchten() {
    global $verbinding;
    $stmt = $verbinding->query("SELECT COUNT(*) AS count FROM Vlucht");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>