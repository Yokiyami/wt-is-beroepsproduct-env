<?php

function medewerkerAutorisatie()
{
    if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'GelreMedewerker2023') {
        header("Location: index.php");
        exit;
    }
}

function passagierAutorisatie()
{
    if (isset($_SESSION['username']) && $_SESSION['username'] === 'GelreMedewerker2023') {
        header("Location: index.php");
        exit;
    } else {
        if (!isset($_SESSION['username']) || $_SESSION['username'] !== $_SESSION['username']) {
            header("Location: index.php");
            exit;
        }
    }
}


?>