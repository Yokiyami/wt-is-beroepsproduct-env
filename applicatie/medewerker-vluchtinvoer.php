<?php

include_once 'header.php';
require_once './php/vlucht-invoer.php';

  ?>

<div class="formuliervenster">
  <h2>Vluchtgegevens</h2>
  <form action="medewerker-vluchtinvoer.php" method="POST">
    <div class="form-rij">
      <label for="vluchtnummer">Vluchtnummer:</label>
      <input type="text" id="vluchtnummer" name="vluchtnummer" required>
    </div>
    <div class="form-rij">
      <label for="bestemming">Bestemming:</label>
      <input type="text" id="bestemming" name="bestemming" required>
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
      <label for="maatschappijcode">Maatschappijcode:</label>
      <input type="text" id="maatschappijcode" name="maatschappijcode" required>
    </div>
    <div class="form-rij">
      <label for="max_aantal">Max passagiers:</label>
      <input type="text" id="max_aantal" name="max_aantal" required>
    </div>
    <div class="form-rij">
      <label for="max_gewicht_pp">Max bagagegewicht per persoon:</label>
      <input type="text" id="max_gewicht_pp" name="max_gewicht_pp" required>
    </div>
    <div class="form-rij">
      <label for="max_totaalgewicht">Max bagagegewicht totaal vlucht:</label>
      <input type="text" id="max_totaalgewicht" name="max_totaalgewicht" required>
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