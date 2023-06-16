<?php
include_once 'header.php';
require_once './php/passagier-checkin-logica.php';
require_once './php/veiligheid.php';
require_once './php/pagina-autorisatie.php';

// CSRFtoken
$csrf_token = generateCSRFToken();

passagierAutorisatie();

?>

<div class="formuliervenster">
    <h2>Inchecken Bagage</h2>
    <form action="./passagier-bagagecheckin.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        <div class="form-rij">
            <label for="passagiernummer">Passagiernummer:</label>
            <input type="number" id="passagiernummer" name="passagiernummer" required>
        </div>
        <div class="form-rij">
            <label for="vluchtnummer">Vluchtnummer:</label>
            <input type="number" id="vluchtnummer" name="vluchtnummer" required>
        </div><br>
        <div class="form-rij">
            <label for="objectvolgnummer1">Object 1:</label>
            <input type="number" id="objectvolgnummer1" name="objectvolgnummer[]" required>
        </div>
        <div class="form-rij">
            <label for="gewicht1">Gewicht object 1:</label>
            <input type="number" id="gewicht1" name="gewicht[]" step="0.01" required>
        </div><br>
        <div class="form-rij">
            <label for="objectvolgnummer2">Object 2:</label>
            <input type="number" id="objectvolgnummer2" name="objectvolgnummer[]">
        </div>
        <div class="form-rij">
            <label for="gewicht2">Gewicht object 2:</label>
            <input type="number" id="gewicht2" name="gewicht[]" step="0.01">
        </div>
        <input type="submit" value="Inchecken Bagage" class="button-link">
    </form>
</div>

<?php
include_once 'footer.php';
?>