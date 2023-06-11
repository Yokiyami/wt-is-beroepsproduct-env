<?php

//Dropdown navbar paginas ophalen
if (isset($_GET['pagina'])) {
    $selectedPage = $_GET['pagina'];
    header("Location: $selectedPage");
    exit;
  }
?>