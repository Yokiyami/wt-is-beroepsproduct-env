<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Vluchtinvoer</title>
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
        <div class="formuliervenster">
            <h2>Vluchtgegevens</h2>
            <form action="/submit" method="POST">
              <div class="form-rij">
                <label for="vluchtnummer">Vluchtnummer:</label>
                <input type="text" id="vluchtnummer" name="vluchtnummer" required>
              </div>
              <div class="form-rij">
                <label for="bestemming">Bestemming:</label>
                <input type="text" id="bestemming" name="bestemming" required>
              </div>
              <div class="form-rij">
                <label for="gatenummer">Gatenummer:</label>
                <select id="gatenummer" name="gatenummer" required>
                  <option value="">Selecteer gatenummer</option>
                  <option value="A1">A1</option>
                  <option value="B2">B2</option>
                  <option value="C3">C3</option>
                </select>
              </div>
              <div class="form-rij">
                <label for="maatschappijcode">Maatschappijcode:</label>
                <select id="maatschappijcode" name="maatschappijcode" required>
                  <option value="">Selecteer maatschappijcode</option>
                  <option value="KLM">KLM</option>
                  <option value="LUF">LUF</option>
                  <option value="BA">BA</option>
                </select>
              </div>
              <div class="form-rij">
                <label for="datum">Datum:</label>
                <input type="date" id="datum" name="datum" required>
              </div>
              <div class="form-rij">
                <label for="tijd">Tijd:</label>
                <input type="time" id="tijd" name="tijd" required>
              </div>
              <input type="submit" value="Verzenden">
            </form>
          </div>          
    </div>
    <footer>
        <span>&copy; 2023 Elvis Salihovic HAN AIM student. Alle rechten voorbehouden.</span>
    </footer>
</body>

</html>