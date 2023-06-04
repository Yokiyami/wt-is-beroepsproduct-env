<?php
session_start();

// Vernietig de sessie en verwijder alle sessievariabelen
session_destroy();

// Redirect naar de inlogpagina
header("Location: ../loginpage.php");
exit;
?>