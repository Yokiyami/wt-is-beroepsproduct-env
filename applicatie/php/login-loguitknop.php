<?php

function toonLoginUitlogKnop()
{
    session_start();
    if (isset($_SESSION['username'])) {
        // Gebruiker is ingelogd
        echo '
        <form action="./php/logout.php" method="post">
            <input type="submit" value="Log uit">
        </form>';

        if ($_SESSION['username'] === 'GelreMedewerker2023') {
            echo '<form action="medewerker-vluchtenoverzicht.php" method="get">
                    <button type="submit">Dashboard</button>
                  </form>';
        } else {
            echo '<form action="passagier-vluchtenoverzicht.php" method="get">
                    <button type="submit">Dashboard</button>
                  </form>';
        }
    } else {
        // Gebruiker is niet ingelogd, toon inlogknop
        echo '
        <a href="./loginpage.php">
            <button type="button">Log in</button>
        </a><br>
        <a href="./registratie.php">
            <button type="button">Registreren</button>
        </a>';

    }
}
?>