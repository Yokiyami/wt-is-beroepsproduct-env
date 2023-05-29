<?php
include_once 'header.php';
include_once 'functies.php';

list($vluchten, $kolommen) = vulVluchten('vluchtenOv');

?>

<div class="zoekbalk">
    <form action="/zoeken" method="GET">
        <input type="text" name="query" placeholder="Zoek hier op vluchtnummer" />
        <input type="submit" value="Zoeken" />
    </form>
</div>
<div class="tabel-container">
    <?php
    echo genereerTabel($vluchten, $kolommen);
    ?>
</div>

<?php

include_once 'footer.php';

?>