<?php

include_once 'header.php';

    ?>

<div class="tabel-container">
    <div class="invenster-links">
        <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
        <a href="passagier-bagageoverzicht.php">Bagage</a>
    </div>
    <table class="tabel">
        <thead>
            <tr>
                <th>Datum &amp; tijd</th>
                <th>Vluchtnr</th>
                <th>Gate</th>
                <th>Bestemming</th>
                <th>Maatschappij</th>
                <th>Bagage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Gate">Schiphol</td>
                <td data-label="Bestemming">A1</td>
                <td data-label="Maatschappij">Schiphol</td>
                <td data-label="Bagage">A1</td>
            </tr>
            <tr>
                <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Gate">Schiphol</td>
                <td data-label="Bestemming">A1</td>
                <td data-label="Maatschappij">Schiphol</td>
                <td data-label="Bagage">A1</td>
            </tr>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php';

    ?>