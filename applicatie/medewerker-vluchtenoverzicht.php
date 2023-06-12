<?php
include_once 'header.php';
include_once './php/vluchtentabel.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

$pagesize = 10;
$start = ontsmet(isset($_GET['start'])) ? ontsmet(intval($_GET['start'])) : 0;
$url = "./medewerker-vluchtenoverzicht.php";

list($vluchten, $kolommen, $foutmelding) = vulVluchten('vluchtenMw', $start, $pagesize);

?>

<div class="zoekbalk">
  <form action="./medewerker-vluchtenoverzicht.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <input type="text" name="vluchtnummer" placeholder="Zoek hier op vluchtnummer" required/>
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
  echo genereerPager($url, $start, $pagesize);
  if ($foutmelding !== null) {
    echo "<p>{$foutmelding}</p>";
  }
  ?>
</div>
<?php

include_once 'footer.php';

?>