<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:10
 */
require_once "Class/autoload.php";

if(isset($_POST['pseudo']) && isset($_POST['psd1']) && isset($_POST['psd2']) && isset($_POST['mail'])){
    if($_POST['psd1'] === $_POST['psd2']){
        User::addUser($_POST['pseudo'],$_POST['psd1'],$_POST['mail']);
    }
    echo "Erreur, les 2 mots de passes ne correspondent pas";
}

echo <<<HTML
    <form method="post">
        <label>Identifiant(Pseudo) : <input type="text" name="pseudo" required></label>
        <label>Mot de passe : <input type="password" name="psd1" required></label>
        <label>Verification mot de passe : <input type="password" name="psd2" required></label>
        <label>Adresse e-mail : <input type="mail" name="mail" required></label>
        <input type="submit">
    </form>
HTML;
