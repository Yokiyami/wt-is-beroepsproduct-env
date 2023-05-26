<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Vluchtenoverzicht Passagier</title>
</head>

<body>
    <header>
        <img src="img/logo.png" alt="Een plaatje van een vliegtuigje als een logo">
        <h1> Gelre Checkin</h1>
        <div class="login-button">
            <a href="passagier-login.php"><button>Passagier</button></a>
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
        <div class="tabel-container">
            <div class="invenster-links">
                <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
                <a href="passagier-bagageoverzicht.php">Bagage</a>
            </div>
            <table class="tabel">
                <thead>
                    <tr>
                        <th>Datum &amp; tijd</th>
                        <th>Vluchtnr</th>
                        <th>Gate</th>
                        <th>Bestemming</th>
                        <th>Maatschappij</th>
                        <th>Bagage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Gate">Schiphol</td>
                        <td data-label="Bestemming">A1</td>
                        <td data-label="Maatschappij">Schiphol</td>
                        <td data-label="Bagage">A1</td>
                    </tr>
                    <tr>
                        <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Gate">Schiphol</td>
                        <td data-label="Bestemming">A1</td>
                        <td data-label="Maatschappij">Schiphol</td>
                        <td data-label="Bagage">A1</td>
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