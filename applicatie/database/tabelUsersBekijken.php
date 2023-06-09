<?php

require_once 'db_connectie.php';

try {
    // Verbinding maken
    $verbinding = maakVerbinding();

    // SELECT-query om de gebruikers op te halen
    $sql = "SELECT * FROM Users";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute();

    // Controleren of er rijen zijn
    if ($stmt->rowCount() < 20) {
        // Resultaten weergeven
        echo "<table>";
        echo "<tr><th>ID</th><th>Gebruikersnaam</th><th>Wachtwoord</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Geen gebruikers gevonden.";
    }
} catch (PDOException $e) {
    echo "Fout bij het ophalen van gebruikers: " . $e->getMessage();
} finally {
    // Verbinding sluiten
    $verbinding = null;
}

?>
