<?php

include_once 'header.php';
require_once './php/vlucht-invoer.php';
require_once './php/veiligheid.php';

$csrf_token = generateCSRFToken();

?>

<div class="formuliervenster">
  <h2>Vluchtgegevens</h2>
  <form action="medewerker-vluchtinvoer.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <div class="form-rij">
      <label for="vluchtnummer">Vluchtnummer:</label>
      <input type="number" id="vluchtnummer" name="vluchtnummer" required>
    </div>
    <div class="form-rij">
      <label for="bestemming">Bestemming:</label>
      <input type="text" id="bestemming" name="bestemming" maxlength="4" required>
    </div>
    <div class="form-rij">
      <label for="gatecode">Gatecode:</label>
      <select id="gatecode" name="gatecode" required>
        <option value="">Selecteer gatecode</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
      </select>
    </div>
    <div class="form-rij">
      <label for="balienummer">Balienummer:</label>
      <select id="balienummer" name="balienummer" required>
        <option value="">Selecteer balienummer</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
    <div class="form-rij">
      <label for="maatschappijcode">Maatschappijcode:</label>
      <input type="text" id="maatschappijcode" name="maatschappijcode" maxlength="5" required>
    </div>
    <div class="form-rij">
      <label for="max_aantal">Max passagiers:</label>
      <input type="number" id="max_aantal" name="max_aantal" required>
    </div>
    <div class="form-rij">
      <label for="max_gewicht_pp">Max bagagegewicht per persoon:</label>
      <input type="number" id="max_gewicht_pp" name="max_gewicht_pp" required>
    </div>
    <div class="form-rij">
      <label for="max_totaalgewicht">Max bagagegewicht totaal vlucht:</label>
      <input type="number" id="max_totaalgewicht" name="max_totaalgewicht" required>
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

<?php

include_once 'footer.php';

?>