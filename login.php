<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/debug.css"> -->
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body style="background-color: #303952; background-image: url(img/geo.png);">
<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:11
 */

require "class/user.class.php";
require_once "class/session.class.php";
Session::start();

if(isset($_SESSION['userID'])){//si connecté redirection vers index.php
    header("Location: index.php");
}
elseif(isset($_COOKIE['token']) && isset($_COOKIE['identifier'])){// si il a les cookies REMEMBER ME
    if(User::verifToken($_COOKIE['token'],$_COOKIE['identifier'])){// si il correspondent
        $_SESSION['userID'] = $_COOKIE['identifier'];

        echo "Vous êtes connecté(e)"; //-----------------------------------------------------------------------------------------------------------------------------------AFFICHAGE une fois la connexion réussie

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
        if(isset($_POST['remember']) && $_POST['remember']){
            $rndINT = random_int(100,1000);
            $userIDHash = hash("sha512",$userID);
            $rndINTHash = hash("sha512",$rndINT);
            $token = hash("sha512",$userIDHash.$rndINTHash);
            User::addTokenAuth($userID,$token);
            setcookie('token',$token,time()+3600*24*7);
            setcookie('identifier',$userID,time()+3600*24*7);
        }
        $_SESSION['userID'] = $userID;
        echo "Vous êtes connecté(e) "; //-----------------------------------------------------------------------------------------------------------------------------------AFFICHAGE une fois la connexion réussie
        echo "<SCRIPT LANGUAGE=\"JavaScript\">document.location.href=\"index.php\";</SCRIPT>";
    }
    else{
        echo "Erreur lors de la connexion"; //-----------------------------------------------------------------------------------------------------------------------------------AFFICHAGE echec de la connexion
    }
}
//todo gerer les restrictions de champs
//todo Securiser les champs contre injection SQL
if(!isset($_SESSION['userID'])){
    echo <<<HTML
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title" style="color:#3dc1d3;">Se connecter</h3>
                    <p class="subtitle" style="color: #A2A9BD;">Merci de vous connecter pour entrer dans ce monde merveilleux...</p>
                        <form action="#" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-rounded has-text-centered" type="text" name="pseudo" placeholder="Pseudo" autofocus="" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-rounded has-text-centered" type="password" name="psd" placeholder="Mot de passe" required>
                                </div>
                            </div>
                            <div class="field">
                                <label class="checkbox has-text-white">
                                  <input type="checkbox" name="remember">
                                  Se souvenir de moi
                                </label>
                            </div>
                            <button type="submit" class="button is-block is-fullwidth is-rounded" style="background-color:#3dc1d3; color: white; border: none;">Se connecter</button>
                        </form>
                    <p class="has-text-grey" style="margin-top: 20px;">
                        <a href="inscription.php">Inscription</a> &nbsp;·&nbsp;
                        <a href="#">Mot de passe oublié</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
HTML;
}

?>
</body>
</html>
