<?php

require_once './database/db_connectie.php';

// Zorgt ervoor dat de pagina alleen wordt verwerkt bij een POST-verzoek
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Haal de gegevens uit het formulier
    $passagiernummer = $_POST['passagiernummer'];
    $password = $_POST['pass'];

    // Hashen van het wachtwoord.
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Controleer of het passagiernummer bestaat in de database
    $verbinding = maakVerbinding();
    $sql = "SELECT * FROM Passagier WHERE passagiernummer = :passagiernummer";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([':passagiernummer' => $passagiernummer]);
    $passagier = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($passagier) {
        // Het passagiernummer bestaat, genereer de gebruikersnaam en voeg de gebruiker toe aan de Users-tabel
        $username = 'P' . $passagiernummer; // Voeg een voorvoegsel toe aan het passagiernummer

        // De SQL query met placeholders (:username, :password)
        $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";

        try {
            // Maak de verbinding en bereid de query voor
            $verbinding = maakVerbinding();
            $stmt = $verbinding->prepare($sql);

            // Bind de waarden aan de placeholders en voer de query uit
            $stmt->execute([':username' => $username, ':password' => $passwordHash]);

            echo "User successfully registered";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        } finally {
            // Sluit de verbinding, ongeacht of er een fout optreedt
            $verbinding = null;
        }
    } else {
        echo "Invalid passagiernummer";
    }
}
?>

