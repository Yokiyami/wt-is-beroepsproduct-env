<?php
include_once 'header.php';
include_once 'php/vluchtentabel.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

list($vluchten, $kolommen, $foutmelding) = vulVluchten('vluchtenMw');

?>

<div class="zoekbalk">
  <form action="./medewerker-vluchtenoverzicht.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <input type="text" name="vluchtnummer" placeholder="Zoek hier op vluchtnummer" />
    <input type="submit" value="Zoeken" />
  </form>
  <div class="toevoeg-button">
    <a href="medewerker-vluchtinvoer.php"><button>Nieuwe vlucht</button></a>
  </div>
</div>
<div class="tabel-container">
  <div class="invenster-links">
    <a href="medewerker-vluchtenoverzicht.php">Vluchten</a>
    <a href="medewerker-passagieroverzicht.php">Passagiers</a>
  </div>
  <?php
  echo genereerTabel($vluchten, $kolommen, 'medewerker-vluchtenoverzicht.php');
  if ($foutmelding !== null) {
    echo "<p>{$foutmelding}</p>";
  }
  ?>
</div>
<?php

include_once 'footer.php';

?>
