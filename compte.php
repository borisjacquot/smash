<script type='text/javascript' src='js/modif_SpanInput.js'></script>
<?php
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
$avatar= $user->avatar;

//toInput(id,typeInput), transforme le span en input avant d etre modifier
echo
<<< HTML
    <h1>Compte</h1>
        <img src="img/avatar/$avatar" width="250px"><br>
        Pseudo : <span onclick="toInput('pseudo','text')" id="pseudo">$pseudo</span><br>
        E-mail : <span onclick="toInput('mail','mail')" id="mail">$mail</span><br>
        <span>Nombre de guides créés : $nbGuide</span>
    <p>Note : En cliquant sur un des champs, il est possible de modifier sa valeur</p>
HTML
;
//TODO REntrer les modifs dans la BD
//todo gerer les restrictions de champs
//todo Securiser les champs contre injection SQL
?>

