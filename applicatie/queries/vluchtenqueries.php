<?php

require_once __DIR__.'/../db_connectie.php';

function haalAlleVluchten($vluchtnummer = null) {
  $vluchtenResult = "SELECT * FROM Vlucht";
  return $vluchtenResult;
}

?>

