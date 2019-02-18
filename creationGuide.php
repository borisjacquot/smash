<?php
require_once "class/session.class.php";
Session::start();

include "class/personnage.class.php";
include "class/guide.class.php";
if(!isset($_SESSION['userID'])){
    header("Location: index.php");
}
if(isset($_POST['perso']) && isset($_POST['presentation']) && isset($_POST['result']) && isset($_POST['video'])){
    Guide::addGuide($_SESSION['userID'],$_POST['perso'],$_POST['presentation'],$_POST['result'],$_POST['video']);  // retourne div avec message création guide succes
}
//
?>

<form action="creationGuide.php" method="post">
    Choix du personnage
    <select name="perso" required>
        <?php
            $persoAll = Personnage::getAll();
            //echo "<option selected disabled></option>";
            foreach ($persoAll as $perso) {
                echo "<option value='$perso->idPersonnage'>$perso->nom</option>";
            }
        ?>
    </select> <br>
    Présentation <br> <textarea name="presentation" cols="30" rows="5"></textarea> <br>
    Combo:<br> <?php include('combo.php'); //div id= result?>
    Video URL : <input name="video" type="url">
    <button type="submit">Envoyer</button>
</form>
