<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 13/02/2019
 * Time: 14:36
 */
require_once "class/session.class.php";
require_once "class/user.class.php";
Session::start();

if(!isset($_SESSION['userID'])){
    header("Location: index.php");
}

//echo $_SESSION['userID'];
$user = user::getUser($_SESSION['userID']);
$pseudo=$user->pseudo;
$mail=$user->mail;
$nbGuide=$user->nbGuide;
echo<<<HTML
    <h1>Compte</h1>
    <ul>
        <span>Pseudo : $pseudo</span><br>
        <span on>E-mail : $mail</span><br>
        <span>Nombre de guide créer : $nbGuide</span>
    </ul>
    <p>Note : En cliquant sur un des champs, il esdt possible de modifier sa valeur</p>
HTML
;
//onClick change le span en input avec valeur, <input onFocusOut=()>
//onFocusout de l'input change en span  <span onFoucusout>valeur<span>
?>


