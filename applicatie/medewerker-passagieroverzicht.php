<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Passagieroverzicht Medewerker</title>
</head>

<body>
    <header>
        <img src="img/logo.png" alt="Een plaatje van een vliegtuigje als een logo">
        <h1> Gelre Checkin</h1>
        <div class="login-button">
            <a href="medewerker-login.php"><button>Medewerker</button></a>
        </div>
    </header>
    <nav class="desktop-nav">
    <ul>
      <a href="index.php">Startpagina</a>
      <a href="privacyverklaring.php">Privacyverklaring</a>
      <a href="contact.php">Contact</a>
      <a href="vluchtenoverzicht.php">Vluchtenoverzicht</a>
    </ul>
  </nav>
    <nav class="mobile-nav">
        <select>
            <option disabled selected>Menu</option>
            <option value="link1">Link 1</option>
            <option value="link2">Link 2</option>
            <option value="link3">Link 3</option>
        </select>
    </nav>
    <div class="main-container">
        <div class="zoekbalk">
            <form action="/zoeken" method="GET">
                <input type="text" name="query" placeholder="Passagiernummer" />
                <input type="submit" value="Zoeken" />
            </form>
            <div class="toevoeg-button">
                <!-- <input type="submit" value="Nieuwe passagier" /> -->
                <a href="medewerker-passagierinvoer.php"><button>Nieuwe passagier</button></a>
            </div>
        </div>
        <div class="tabel-container">
            <div class="invenster-links">
                <a href="medewerker-vluchtenoverzicht.php">Vluchten</a>
                <a href="medewerker-passagieroverzicht.php">Passagiers</a>
            </div>
            <table class="tabel">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Geslacht</th>
                        <th>Vluchtnummer</th>
                        <th>Stoel</th>
                        <th>Check-in</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Naam">01-05-2023 09:00</td>
                        <td data-label="Geslacht">KL123</td>
                        <td data-label="Vluchtnummer">Schiphol</td>
                        <td data-label="Stoel">A1</td>
                        <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Naam">01-05-2023 09:00</td>
                        <td data-label="Geslacht">KL123</td>
                        <td data-label="Vluchtnummer">Schiphol</td>
                        <td data-label="Stoel">A1</td>
                        <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Naam">01-05-2023 09:00</td>
                        <td data-label="Geslacht">KL123</td>
                        <td data-label="Vluchtnummer">Schiphol</td>
                        <td data-label="Stoel">A1</td>
                        <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Naam">01-05-2023 09:00</td>
                        <td data-label="Geslacht">KL123</td>
                        <td data-label="Vluchtnummer">Schiphol</td>
                        <td data-label="Stoel">A1</td>
                        <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <span>&copy; 2023 Elvis Salihovic HAN AIM student. Alle rechten voorbehouden.</span>
    </footer>
</body>

</html>