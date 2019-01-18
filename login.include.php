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

if(isset($_COOKIE['token']) && isset($_COOKIE['identifier'])){// si il a les cookies REMEMBER ME
    if(User::verifToken($_COOKIE['token'],$_COOKIE['identifier'])){// si il correspondent
        $_SESSION['userID'] = $_COOKIE['identifier'];
        echo 'TEST';
    }
    else{
        $_SESSION['userID']="";
        USer::delTokenAuth();
    }
}
elseif(isset($_POST['pseudo']) && isset($_POST['psd'])){ // si il se connecte avec le formulaire
    $userID = User::createFromAuth($_POST['pseudo'],$_POST['psd']);//verifie si compte est bon si oui return userId sinon FALSE

    if($userID!=null){
        $userID = $userID->idUser;
        if($_POST['remember']){
            $rndINT = random_int(100,1000);
            $userIDHash = hash("sha512",$userID);
            $rndINTHash = hash("sha512",$rndINT);
            $token = hash("sha512",$userIDHash.$rndINTHash);
            User::addTokenAuth($userID,$token);
            setcookie('token',$token,time()+3600*24*7);
            setcookie('identifier',$userID,time()+3600*24*7);
        }
        $_SESSION['userID'] = $userID;
    }
}

echo <<<HTML
    <form action="#" method="post">
        <label>Identifiant(Pseudo) : <input type="text" name="pseudo" required></label>
        <label>Mot de passe : <input type="password" name="psd" required></label>
        <label>Remember me :<input type="checkbox" name="remember"> </label>
        <input type="submit">
    </form>
HTML;

