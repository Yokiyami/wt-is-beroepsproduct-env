<?php

require_once './database/db_connectie.php';

function checkPassagier($passagiernummer)
{
    $verbinding = maakVerbinding();
    $sql = "SELECT * FROM Passagier WHERE passagiernummer = :passagiernummer";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([':passagiernummer' => $passagiernummer]);
    $passagier = $stmt->fetch(PDO::FETCH_ASSOC);
    return $passagier;
}

function checkUser($username)
{
    $verbinding = maakVerbinding();
    $sql = "SELECT * FROM Users WHERE username = :username";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function voegUserToe($username, $passwordHash)
{
    $verbinding = maakVerbinding();
    $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";

    try {
        $stmt = $verbinding->prepare($sql);
        $stmt->execute([':username' => $username, ':password' => $passwordHash]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
?>
