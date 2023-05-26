<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <meta charset="utf-8">
    <title>Bagageoverzicht Passagier</title>
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
            <div class="invenster-links">
                <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
                <a href="passagier-bagageoverzicht.php">Bagage</a>
            </div>
            <table class="tabel">
                <thead>
                    <tr>
                        <th>Bagagenr</th>
                        <th>Vluchtnr</th>
                        <th>Passagiernr</th>
                        <th>Bagage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Bagagenr">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Passagiernr">Schiphol</td>
                        <td data-label="Bagage">
                            <select>
                                <option disabled selected>Kg</option>
                                <option value="link1">Handbagage</option>
                                <option value="link2"> - 25kg </option>
                                <option value="link3"> + 25kg </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Bagagenr">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Passagiernr">Schiphol</td>
                        <td data-label="Bagage">
                            <select>
                                <option disabled selected>Kg</option>
                                <option value="link1">Handbagage</option>
                                <option value="link2"> - 25kg </option>
                                <option value="link3"> + 25kg </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Bagagenr">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Passagiernr">Schiphol</td>
                        <td data-label="Bagage">
                            <select>
                                <option disabled selected>Kg</option>
                                <option value="link1">Handbagage</option>
                                <option value="link2"> - 25kg </option>
                                <option value="link3"> + 25kg </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Bagagenr">01-05-2023 09:00</td>
                        <td data-label="Vluchtnr">KL123</td>
                        <td data-label="Passagiernr">Schiphol</td>
                        <td data-label="Bagage">
                            <select>
                                <option disabled selected>Kg</option>
                                <option value="link1">Handbagage</option>
                                <option value="link2"> - 25kg </option>
                                <option value="link3"> + 25kg </option>
                            </select>
                        </td>
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