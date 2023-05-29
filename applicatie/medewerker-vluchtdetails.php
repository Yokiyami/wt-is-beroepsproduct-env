<?php

include_once 'header.php';
include_once 'functies.php';

?>

<div class="tabel-container">
    <h1>Vluchtdetails</h1>
    <br>
    <table class="tabel">
        <thead>
            <tr>
                <th>Bestemming</th>
                <th>Gate</th>
                <th>Vluchthaven</th>
                <th>Max passagiers</th>
                <th>Vertrektijd</th>
                <th>Maatschappij</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <tr>
                <td data-label="Bestemming">
                    <?= $vlucht['bestemming'] ?>
                </td>
                <td data-label="Gate">
                    <?= $vlucht['gate'] ?>
                </td>
                <td data-label="Vluchthaven">
                    <?= $vlucht['luchthaven'] ?>
                </td>
                <td data-label="Max passagiers">
                    <?= $vlucht['max passagiers'] ?>
                </td>
                <td data-label="Vertrektijd">
                    <?= $vlucht['vertrektijd'] ?>
                </td>
                <td data-label="Maatschappij">
                    <?= $vlucht['maatschappij'] ?>
                </td>
            </tr>
            </tr>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php'

    ?>