<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Passagierinvoer</title>
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
        <div class="formuliervenster">
            <h2>Passagier invoeren</h2>
            <form action="/submit" method="POST">
                <div class="form-rij">
                    <label for="naam">Naam:</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
                <div class="form-rij">
                    <label for="passagiernummer">Passagiernummer:</label>
                    <input type="text" id="passagiernummer" name="passagiernummer" required>
                </div>
                <div class="form-rij">
                    <label for="stoelnummer">Stoelnummer:</label>
                    <input type="text" id="stoelnummer" name="stoelnummer" required>
                </div>
                <div class="form-rij">
                    <label for="geslacht">Geslacht:</label>
                    <div class="radio-options">
                        <label>
                            <input type="radio" name="geslacht" value="man" required>
                            Man
                        </label>
                        <label>
                            <input type="radio" name="geslacht" value="vrouw" required>
                            Vrouw
                        </label>
                    </div>
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