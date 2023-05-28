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
    <div class="invenster-links">
        <a href="passagier-vluchtenoverzicht.php">Mijn vluchten</a>
        <a href="passagier-bagageoverzicht.php">Bagage</a>
    </div>
    <table class="tabel">
        <thead>
            <tr>
                <th>Bagagenr</th>
                <th>Vluchtnr</th>
                <th>Passagiernr</th>
                <th>Bagage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Bagagenr">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Passagiernr">Schiphol</td>
                <td data-label="Bagage">
                    <select>
                        <option disabled selected>Kg</option>
                        <option value="link1">Handbagage</option>
                        <option value="link2"> - 25kg </option>
                        <option value="link3"> + 25kg </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td data-label="Bagagenr">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Passagiernr">Schiphol</td>
                <td data-label="Bagage">
                    <select>
                        <option disabled selected>Kg</option>
                        <option value="link1">Handbagage</option>
                        <option value="link2"> - 25kg </option>
                        <option value="link3"> + 25kg </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td data-label="Bagagenr">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Passagiernr">Schiphol</td>
                <td data-label="Bagage">
                    <select>
                        <option disabled selected>Kg</option>
                        <option value="link1">Handbagage</option>
                        <option value="link2"> - 25kg </option>
                        <option value="link3"> + 25kg </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td data-label="Bagagenr">01-05-2023 09:00</td>
                <td data-label="Vluchtnr">KL123</td>
                <td data-label="Passagiernr">Schiphol</td>
                <td data-label="Bagage">
                    <select>
                        <option disabled selected>Kg</option>
                        <option value="link1">Handbagage</option>
                        <option value="link2"> - 25kg </option>
                        <option value="link3"> + 25kg </option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php';

    ?>