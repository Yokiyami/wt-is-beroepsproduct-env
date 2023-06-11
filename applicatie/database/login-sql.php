<?php
require_once './database/db_connectie.php';

function getUserByUsername($username)
{
    $verbinding = maakVerbinding();
    $sql = "SELECT * FROM Users WHERE username = :username";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([':username' => $username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function createUserSession($username)
{
    $_SESSION['username'] = $username;
}

function verifyUser($username, $password)
{
    $user = getUserByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        createUserSession($user['username']);
        return true;
    }

    return false;
}

function getPassengerUsername($passagiernummer)
{
    $verbinding = maakVerbinding();
    $sql = "SELECT username FROM Users WHERE username = :username";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([':username' => $passagiernummer]);
    return $stmt->fetchColumn();
}
?>
