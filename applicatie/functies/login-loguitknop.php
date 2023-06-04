<?php
function toonLoginUitlogKnop()
{
    session_start();
    if (isset($_SESSION['username'])) {
        // Gebruiker is ingelogd
        echo '
        <form action="./functies/logout.php" method="post">
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
        <form action="./loginpage.php" method="post">
            <input type="submit" value="Log in">
        </form>';
    }
}
?>
