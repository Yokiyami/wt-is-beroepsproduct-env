<?php
require_once 'db_connectie.php';

try {
    $verbinding = maakVerbinding();

    // Voeg een standaard medewerker toe aan de tabel
    $username = 'GelreMedewerker2023';
    $password = password_hash('P@sSwOrd2023!', PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([':username' => $username, ':password' => $password]);

    echo "Standaard medewerker toegevoegd aan de Users-tabel.";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>