<?php

require_once 'veiligheid.php';

//Dropdown navbar paginas ophalen
if (isset($_GET['pagina'])) {
    $selectedPage = ontsmet($_GET['pagina']);
    header("Location: $selectedPage");
    exit;
  }
?>