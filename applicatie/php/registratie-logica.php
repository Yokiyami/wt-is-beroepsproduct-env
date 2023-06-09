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
        // Controleer of de gebruiker al bestaat in de Users-tabel
        $sql = "SELECT * FROM Users WHERE username = :username";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':username' => $passagiernummer]);
        $bestaandeGebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($bestaandeGebruiker) {
            echo "User already registered";
        } else {
            // De gebruiker bestaat nog niet, voeg hem toe aan de Users-tabel
            $username = $passagiernummer;

            // De SQL query met placeholders (:username, :password)
            $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";

            try {
                // Maak de verbinding en bereid de query voor
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
        }
    } else {
        echo "Invalid passagiernummer";
    }
}

?>
