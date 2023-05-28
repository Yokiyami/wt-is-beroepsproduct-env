<?php

include_once 'header.php';

    ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $pwd = $_POST["password"];

    if ($name == "admin" && $pwd == "wachtwoord") {
        header("Location: medewerker-vluchtenoverzicht.php");
        exit();
    } else {
        echo "FOUT!!!!";
    }
}
?>

<div class="formuliervenster">
    <h2>Login(medewerker)</h2>
    <br>
    <form action="./medewerker-login.php" method="POST">
        <div>
            <label for="username">Gebruikersnaam:</label>
            <br>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Wachtwoord:</label>
            <br>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Inloggen">
        </div>
    </form>
</div>

<?php

include_once 'footer.php';

    ?>