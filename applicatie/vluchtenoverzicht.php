<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Vluchtenoverzicht</title>
</head>

<body>
    <header>
        <img src="img/logo.png" alt="Een plaatje van een vliegtuigje als een logo">
        <h1> Gelre Checkin</h1>
        <div class="login-button">
            <p>Log in als:</p>
            <a href="passagier-login.php"><button>Passagier</button></a>
            <br>
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
                <input type="text" name="query" placeholder="Zoek hier op vluchtnummer" />
                <input type="submit" value="Zoeken" />
            </form>
        </div>
        <div class="tabel-container">
            <table class="tabel">
                <thead>
                    <tr>
                        <th>Datum &amp; tijd</th>
                        <th>Vluchtnr</th>
                        <th>Gate</th>
                        <th>Bestemming</th>
                        <th>Maatschappij</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Bestemming">Londen</td>
                        <td data-label="Maatschappij">KLM</td>
                    </tr>
                    <tr>
                        <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Bestemming">Londen</td>
                        <td data-label="Maatschappij">KLM</td>
                    </tr>
                    <tr>
                        <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Bestemming">Londen</td>
                        <td data-label="Maatschappij">KLM</td>
                    </tr>
                    <tr>
                        <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Gate">A1</td>
                        <td data-label="Bestemming">Londen</td>
                        <td data-label="Maatschappij">KLM</td>
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