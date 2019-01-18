<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:11
 */

require "Class/user.class.php";
require_once "Class/Session.class.php";
Session::start();
if(isset($_POST['pseudo']) && isset($_POST['psd'])){
    $userID = User::createFromAuth($_POST['pseudo'],$_POST['psd']);
    var_dump($userID);
    if($userID!=null){
        $_SESSION['userID'] = $userID->idUser;

    }
}
if(isset($_SESSION['userID'])){
    echo "Connected as user number ".$_SESSION['userID'];
}

echo <<<HTML
    <form action="#" method="post">
        <label>Identifiant(Pseudo) : <input type="text" name="pseudo"></label>
        <label>Mot de passe : <input type="password" name="psd"></label>
        <input type="submit">
    </form>
HTML;
