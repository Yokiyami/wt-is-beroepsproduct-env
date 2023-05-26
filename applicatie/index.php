<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace&display=swap" rel="stylesheet">
  <meta charset="utf-8">
  <title>Gelre Checkin</title>
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
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut risus vitae ipsum eleifend dignissim. Sed eu
    tellus non nisl laoreet tincidunt. Morbi vestibulum tellus nulla, vel tincidunt lectus aliquam ut. Nulla facilisi.
    Sed iaculis fermentum orci, vel eleifend elit. Quisque mattis nunc ac dui faucibus posuere. Nam vestibulum est in
    lacus blandit, id euismod lacus commodo. Nunc id efficitur neque, id suscipit velit. Integer at eros tristique,
    rhoncus nulla eu, viverra quam. Etiam maximus bibendum odio, ut efficitur mi ullamcorper vel. Maecenas ullamcorper
    ultrices mi ac aliquet.

    Nulla dapibus est vitae est fringilla rutrum. Sed ac magna iaculis, convallis mauris eu, auctor metus. Ut luctus
    feugiat tincidunt. Nam gravida quam at sapien facilisis, nec semper urna pulvinar. In hac habitasse platea
    dictumst. Aenean tempus arcu sit amet malesuada porta. Nulla id finibus justo, ac pulvinar nisi. Nulla eu metus
    lectus. Nam ut tempor lacus. Donec congue diam nec sem iaculis bibendum. Integer dictum, justo id cursus
    convallis, odio mauris iaculis massa, a efficitur urna elit id orci. Sed cursus pretium tellus nec efficitur.

    Vestibulum rutrum cursus tellus nec volutpat. Curabitur euismod nulla a turpis tempor, eu aliquam nisl aliquet.
    Praesent quis lacinia nisi. Integer pretium nisi sit amet leo consequat, in finibus est auctor. Phasellus ac
    elementum purus. Etiam ut metus eu tellus tincidunt fringilla sed vitae velit. Nam vehicula metus et sem rhoncus,
    in consectetur mauris tincidunt. Sed imperdiet ante non elit egestas facilisis. Quisque vulputate aliquam mauris,
    id sagittis erat maximus ac. Duis auctor ipsum nec felis tristique, sit amet dictum ante aliquet. Integer id elit
    id ante rhoncus iaculis. Fusce elementum, neque id maximus semper, odio mauris malesuada est, a vestibulum odio
    justo at lacus. Curabitur fringilla rutrum tortor, in rhoncus est feugiat sed.
  </div>
  <footer>
    <span>&copy; 2023 Elvis Salihovic HAN AIM student. Alle rechten voorbehouden.</span>
  </footer>
</body>

</html>