<?php

// Functie om data te ontsmetten
function ontsmet($data) {
    if ($data === null) {
        return null;
    }

    if (is_array($data)) {
        $ontsmet_data = array();
        foreach ($data as $element) {
            $element = trim($element);
            $element = stripslashes($element);
            $element = htmlspecialchars($element);
            $ontsmet_data[] = $element;
        }
        return $ontsmet_data;
    }

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Functie om een CSRF-token te genereren
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Functie om de CSRF-token te valideren
function validateCSRFToken($token) {
    if (!empty($_SESSION['csrf_token']) && is_string($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
        unset($_SESSION['csrf_token']);
        return true;
    }
    return false;
}

?>
