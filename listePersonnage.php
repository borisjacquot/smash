<script type='text/javascript' src='js/ajaxrequest.js'></script>
<script type='text/javascript' src='js/jsListePerso.js'></script>
<?php 
require "class/autoload.include.php";
?>
<form id="search">
    <input type="text" id='nom'>
    <section><h2>Filtré par jeux</h2>
        <label for="Super Mario"><input type="checkbox" id="Super Mario">Super Mario</label>
        <label for="The legend of Zelda"><input type="checkbox" id="The legend of Zelda">The legend of Zelda</label>
        <label for="Metroid"><input type="checkbox" id="Metroid">Metroid</label>
        <label for="Fire Emblem"><input type="checkbox" id="Fire Emblem">Fire Emblem</label>
        <label for="Pokemon"><input type="checkbox" id="Pokemon">Pokemon</label>
    </section>
    Liste des personnages : 
    <span id="liste"></span>
</form>