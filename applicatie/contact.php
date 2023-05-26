<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Contact</title>
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
        <div class="formuliervenster">
            <h2>Contactformulier</h2>
            <br>
            <form action="/contact" method="POST">
                <div>
                    <label for="name">Naam:</label>
                    <br>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <br>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Bericht:</label>
                    <br>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div>
                    <input type="submit" value="Verzenden">
                </div>
            </form>
        </div>
    </div>
    <footer>
        <span>&copy; 2023 Elvis Salihovic HAN AIM student. Alle rechten voorbehouden.</span>
    </footer>
</body>

</html>