<?php

require_once './php/veiligheid.php';
require_once './database/db_connectie.php';
require_once './database/registratie-sql.php';

// Pagina verwerken bij een POST verzoek
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // CSRF-token validatie
    validateCSRFToken($_POST['csrf_token']);

    // Haal de gegevens uit het formulier en ontsmet deze
    $passagiernummer = ontsmet($_POST['passagiernummer']);
    $password = ontsmet($_POST['pass']);

    // Hashen van het wachtwoord.
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Controleer of het passagiernummer bestaat in de database
    $passagier = checkPassagier($passagiernummer);

    if ($passagier) {
        // Controleer of de gebruiker al bestaat in de Users-tabel
        $bestaandeGebruiker = checkUser($passagiernummer);

        if ($bestaandeGebruiker) {
            echo "User already registered";
        } else {
            // De gebruiker bestaat nog niet, voeg hem toe aan de Users-tabel
            $username = $passagiernummer;

            if (voegUserToe($username, $passwordHash)) {
                echo "User successfully registered";
            } else {
                echo "Error registering user";
            }
        }
    } else {
        echo "Invalid passagiernummer";
    }
}

?>
