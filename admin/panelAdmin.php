<script type='text/javascript' src='../js/ajaxrequest.js'></script>
<script type='text/javascript' src='../js/jsPanelAdmin.js'></script>
<?php 
require "../class/autoload.include.php";
?>
<form method="get" name='search'>
    <input type="text" id="pseudo">
    Liste des personnes : 
	<span id="liste"></span>
</form>

TODO : Rajouter des filtres de recherche