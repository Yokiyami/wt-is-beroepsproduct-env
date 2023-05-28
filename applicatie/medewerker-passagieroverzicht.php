<?php

include_once 'header.php';

    ?>

<div class="zoekbalk">
    <form action="/zoeken" method="GET">
        <input type="text" name="query" placeholder="Passagiernummer" />
        <input type="submit" value="Zoeken" />
    </form>
    <div class="toevoeg-button">
        <!-- <input type="submit" value="Nieuwe passagier" /> -->
        <a href="medewerker-passagierinvoer.php"><button>Nieuwe passagier</button></a>
    </div>
</div>
<div class="tabel-container">
    <div class="invenster-links">
        <a href="medewerker-vluchtenoverzicht.php">Vluchten</a>
        <a href="medewerker-passagieroverzicht.php">Passagiers</a>
    </div>
    <table class="tabel">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Geslacht</th>
                <th>Vluchtnummer</th>
                <th>Stoel</th>
                <th>Check-in</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Naam">01-05-2023 09:00</td>
                <td data-label="Geslacht">KL123</td>
                <td data-label="Vluchtnummer">Schiphol</td>
                <td data-label="Stoel">A1</td>
                <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
            </tr>
            <tr>
                <td data-label="Naam">01-05-2023 09:00</td>
                <td data-label="Geslacht">KL123</td>
                <td data-label="Vluchtnummer">Schiphol</td>
                <td data-label="Stoel">A1</td>
                <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
            </tr>
            <tr>
                <td data-label="Naam">01-05-2023 09:00</td>
                <td data-label="Geslacht">KL123</td>
                <td data-label="Vluchtnummer">Schiphol</td>
                <td data-label="Stoel">A1</td>
                <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
            </tr>
            <tr>
                <td data-label="Naam">01-05-2023 09:00</td>
                <td data-label="Geslacht">KL123</td>
                <td data-label="Vluchtnummer">Schiphol</td>
                <td data-label="Stoel">A1</td>
                <td data-label="Check-in"><a href="medewerker-checkin.php"><button>Check-in</button></a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php

include_once 'footer.php';

    ?>