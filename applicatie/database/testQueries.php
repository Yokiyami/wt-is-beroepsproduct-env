<?php
include_once 'bagagequerie.php';

function testHaalPassagierBagage() {
  // Call the function with test parameters
  // Assuming an existing passagiernummer, objectnummer
  // Change the parameters as per your data
  $result = haalPassagierBagage(123456, 1);

  // Check if we got a result
  if($result === false) {
    echo "Er is een fout opgetreden bij het uitvoeren van de query.<br>";
  } else {
    // If there is a result, print it out
    foreach ($result as $row) {
      echo "Objectnummer: " . $row['Objectnummer'] . "<br>";
      echo "Vluchtnummer: " . $row['Vluchtnummer'] . "<br>";
      echo "Passagiernummer: " . $row['Passagiernummer'] . "<br>";
      echo "Gewicht: " . $row['Gewicht'] . "<br>";
      echo "---------------------------------<br>";
    }
  }
}

// Call the test function
testHaalPassagierBagage();
?>