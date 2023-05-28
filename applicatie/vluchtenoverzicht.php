<?php

include_once 'header.php';

    ?>

<div class="zoekbalk">
    <form action="/zoeken" method="GET">
        <input type="text" name="query" placeholder="Zoek hier op vluchtnummer" />
        <input type="submit" value="Zoeken" />
    </form>
</div>
<div class="tabel-container">
    <table class="tabel">
        <thead>
            <tr>
                <th>Datum &amp; tijd</th>
                <th>Vluchtnr</th>
                <th>Gate</th>
                <th>Bestemming</th>
                <th>Maatschappij</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Gate">A1</td>
                <td data-label="Bestemming">Londen</td>
                <td data-label="Maatschappij">KLM</td>
            </tr>
            <tr>
                <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Gate">A1</td>
                <td data-label="Bestemming">Londen</td>
                <td data-label="Maatschappij">KLM</td>
            </tr>
            <tr>
                <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Gate">A1</td>
                <td data-label="Bestemming">Londen</td>
                <td data-label="Maatschappij">KLM</td>
            </tr>
            <tr>
                <td data-label="Datum &amp; tijd">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Gate">A1</td>
                <td data-label="Bestemming">Londen</td>
                <td data-label="Maatschappij">KLM</td>
            </tr>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php';

    ?>