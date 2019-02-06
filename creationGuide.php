<?php
require_once "class/session.class.php";
Session::start();
include "class/personnage.class.php";
?>

<form action="post">
    Choix du personnage
    <select name="perso" id="">
        <?php
            $persoAll = Personnage::getAll();
            var_dump($persoAll);
            /*
            foreach ($persoAll as $perso) {
                echo "<option>".$perso."</option>";
            }*/
        ?>
    </select>
    Présentation <textarea name="" id="" cols="30" rows="10"></textarea>
    Combo<input type="text">
    Video URL : <input type="url">
    <button type="submit">Envoyer</button>
    
</form>