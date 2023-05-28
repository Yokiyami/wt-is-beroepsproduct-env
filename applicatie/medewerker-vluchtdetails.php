<?php

include_once 'header.php'

    ?>

<div class="tabel-container">
    <h1>Vluchtdetails</h1>
    <br>
    <div class="zoekbalk">
        <form action="/zoeken" method="POST">
            <input type="text" name="query" placeholder="Zoek hier op vluchtnummer" />
            <input type="submit" value="Zoeken" />
        </form>
    </div>
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
                <td data-label="Bestemming">01-05-2023 09:00</td>
                <td data-label="Gate">KL123</td>
                <td data-label="Vluchthaven">Schiphol</td>
                <td data-label="Max passagiers">A1</td>
                <td data-label="Vertrektijd">A1</td>
                <td data-label="Maatschappij">A1</td>
            </tr>
            </tr>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php'

    ?>