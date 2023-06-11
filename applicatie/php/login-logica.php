<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once './database/db_connectie.php';
include_once './php/veiligheid.php';
require_once './database/login-sql.php';

// CSRF-token
$csrf_token = generateCSRFToken();

function login()
{
    $logged_in = false;
    $html = '';
    $redirect = '';

    if (isset($_SESSION['username'])) {
        $html = "<h1>Welcome " . ontsmet($_SESSION['username']) . "</h1>"; // XSS preventie
        $logged_in = true;
        $redirect = 'passagier-vluchtenoverzicht.php';
    }

    return [$logged_in, $html, $redirect];
}

function loginFunctie($logged_in)
{
    if ($logged_in) {
        require_once 'passagier-vluchtenoverzicht.php';
    }
}

// Zorgt ervoor dat de pagina alleen wordt verwerkt bij een POST-verzoek
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF-validatie
    if (!validateCSRFToken($_POST['csrf_token'])) {
        die('Invalid CSRF token');
    }

    if (isset($_POST['passagiernummer']) && isset($_POST['password'])) {
        $passagiernummer = ontsmet($_POST['passagiernummer']);
        $password = ontsmet($_POST['password']);

        // Controleer of het een medewerker is
        if ($passagiernummer === 'GelreMedewerker2023' && $password === 'P@sSwOrd2023!') {
            $_SESSION['username'] = $passagiernummer;
            header("Location: medewerker-vluchtenoverzicht.php");
            exit;
        }

        // Haal de gebruikersnaam op basis van het passagiernummer
        $username = getPassengerUsername($passagiernummer);

        if (verifyUser($username, $password)) {
            // Gebruiker is ingelogd, redirect naar de juiste pagina
            header("Location: passagier-vluchtenoverzicht.php");
            exit;
        } else {
            echo "Fout wachtwoord en/of passagiernummer";
        }
    } else {
        echo "Voer je passagiernummer (of medewerkeraccount) en wachtwoord in.";
    }
}
?>
