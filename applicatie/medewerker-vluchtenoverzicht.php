<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Vluchtenoverzicht medewerker</title>
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
    <form action="functies.php" method="GET">
      <select name="pagina" onchange="this.form.submit()">
        <option disabled selected>Menu</option>
        <option value="index.php">Startpagina</option>
        <option value="privacyverklaring.php">Privacyverklaring</option>
        <option value="contact.php">Contact</option>
        <option value="vluchtenoverzicht.php">Vluchtenoverzicht</option>
      </select>
    </form>
  </nav>
    <div class="main-container">
        <div class="zoekbalk">
            <form action="/zoeken" method="GET">
                <input type="text" name="query" placeholder="Zoek hier op vluchtnummer" />
                <input type="submit" value="Zoeken" />
            </form>
            <div class="toevoeg-button">
                <!-- <input type="submit" value="Nieuwe vlucht" /> -->
                <a href="medewerker-vluchtinvoer.php"><button>Nieuwe vlucht</button></a>
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
                        <th>Datum &amp; tijd</th>
                        <th>Vluchtnr</th>
                        <th>Luchthaven</th>
                        <th>Gate</th>
                        <th>Detailpagina</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Datum">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Luchthaven">Schiphol</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Detailpagina"><a href="medewerker-vluchtdetails.php"><button>Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Datum">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Luchthaven">Schiphol</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Detailpagina"><a href="medewerker-vluchtdetails.php"><button>Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Datum">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Luchthaven">Schiphol</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Detailpagina"><a href="medewerker-vluchtdetails.php"><button>Details</button></a></td>
                    </tr>
                    <tr>
                        <td data-label="Datum">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Luchthaven">Schiphol</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Detailpagina"><a href="medewerker-vluchtdetails.php"><button>Details</button></a></td>
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