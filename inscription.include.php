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
 * Time: 16:10
 */

require "class/user.class.php";
require_once "class/session.class.php";
Session::start();
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
else{
    echo <<<HTML
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title" style="color:#3dc1d3;">S'inscrire</h3>
                    <p class="subtitle" style="color: #A2A9BD;">Vous faites le bon choix en rejoignant nos rangs !</p>
                        <form action="#" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-rounded has-text-centered" type="text" name="pseudo" placeholder="Pseudo" autofocus="" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-rounded has-text-centered" type="password" name="psd1" placeholder="Mot de passe" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-rounded has-text-centered" type="password" name="psd2" placeholder="Répéter le mot de passe" required>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-rounded has-text-centered" type="mail" name="mail" placeholder="Adresse mail" autofocus="" required>
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-fullwidth is-rounded" style="background-color:#3dc1d3; color: white; border: none;">S'inscrire</button>
                        </form>
                    <p class="has-text-grey" style="margin-top: 20px;">
                        <a href="login.include.php">Connexion</a>
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
