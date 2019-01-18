<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:10
 */

require "Class/user.class.php";
require_once "Class/Session.class.php";
Session::start();
if(isset($_SESSION['']))
if(isset($_POST['pseudo']) && isset($_POST['psd1']) && isset($_POST['psd2']) && isset($_POST['mail'])){
    if($_POST['psd1'] === $_POST['psd2']){
        if(User::pseudoUse($_POST['pseudo'])) {
            User::addUser($_POST['pseudo'], $_POST['psd1'], $_POST['mail']);
            echo "Le compte a été créé avec succès !";
        }
        else{
            echo "Erreur, pseudo déjà utilisé";
        }
    }
    else{
        echo "Erreur, les 2 mots de passes ne correspondent pas";
    }

}
if(isset($_SESSION['userID'])){
    echo "Connected as user number ".$_SESSION['userID'];
}
echo <<<HTML
    <form action="inscription.php" method="post">
        <label>Identifiant(Pseudo) : <input type="text" name="pseudo" required></label>
        <label>Mot de passe : <input type="password" name="psd1" required></label>
        <label>Verification mot de passe : <input type="password" name="psd2" required></label>
        <label>Adresse e-mail : <input type="mail" name="mail" required></label>
        <input type="submit">
    </form>
HTML;
