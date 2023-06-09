<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once './database/db_connectie.php';

//CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function login()
{
    $logged_in = false;
    $html = '';
    $redirect = '';

    if (isset($_SESSION['username'])) {
        $html = "<h1>Welcome " . htmlspecialchars($_SESSION['username']) . "</h1>"; // XSS preventie
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

function verifyUser($username, $password)
{
    $verbinding = maakVerbinding();
    $sql = "SELECT * FROM Users WHERE username = :username";
    $stmt = $verbinding->prepare($sql);

    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        return true;
    }

    return false;
}

// Zorgt ervoor dat de pagina alleen wordt verwerkt bij een POST-verzoek
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF preventie
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Invalid CSRF token');
    }

    if (isset($_POST['passagiernummer']) && isset($_POST['password'])) {
        $passagiernummer = $_POST['passagiernummer'];
        $password = $_POST['password'];

        // Controleer of het een medewerker is
        if ($passagiernummer === 'GelreMedewerker2023' && $password === 'P@sSwOrd2023!') {
            $_SESSION['username'] = $passagiernummer;
            header("Location: medewerker-vluchtenoverzicht.php");
            exit;
        }

        // Haal de gebruikersnaam op basis van het passagiernummer
        $verbinding = maakVerbinding();
        $sql = "SELECT username FROM Users WHERE username = :username";
        $stmt = $verbinding->prepare($sql);

        $stmt->execute([':username' => $passagiernummer]);
        $username = $stmt->fetchColumn();

        if (verifyUser($username, $password)) {
            // Gebruiker is ingelogd, redirect naar de juiste pagina
            header("Location: passagier-vluchtenoverzicht.php");
            exit;
        } else {
            echo "Fout wachtwoord en/of passagiernummer";
        }
    } else {
        echo "Voer je passagiernummer(of medewerkeraccount) en wachtwoord in.";
    }
}
?>