<?php

include_once 'header.php';

  ?>

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

<?php

include_once 'footer.php';

  ?>