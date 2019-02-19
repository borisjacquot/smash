<?php
if(isset($_POST['logout'])){
    session_destroy();
    $_SESSION['userID'] =null;
    //echo "Deconnexion réussie";//----------------------------AFFICHAGE message confirme deconnexion
}
if(isset($_POST['connexion'])) {

    if (isset($_COOKIE['token']) && isset($_COOKIE['identifier'])) {// si il a les cookies REMEMBER ME

        if (User::verifToken($_COOKIE['token'], $_COOKIE['identifier'])) {// si il correspondent
            $_SESSION['userID'] = $_COOKIE['identifier'];
        } else {
            $_SESSION['userID'] = "";
            USer::delTokenAuth();
        }
    }else{echo "<SCRIPT LANGUAGE=\"JavaScript\">document.location.href=\"login.php\"</SCRIPT>";}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guides</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/debug.css"> -->
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>

<!-- .hero -->
<section class="hero is-dark is-shadowless">

<!-- .hero-head -->
    <div class="hero-head">
        <div class="columns is-mobile is-marginless heading has-text-weight-bold" style="background-color: #303952;">
            <div class="column left">
                <p class="navbar-item has-text-white">BetterSmash</p>
            </div>
            <div class="column center desktop">
                <p class="navbar-item active"><i class="fas fa-book" style="margin-right: 5px;"></i>GUIDES</p>
                <p class="navbar-item"><a href="/" class="nonactive"><i class="fas fa-home" style="color:#3dc1d3;margin-right: 5px;"></i> ACCUEIL</a></p>
                <p class="navbar-item"><a href="listePersonnage.php" class="nonactive"><i class="fas fa-fist-raised" style="color:#3dc1d3;margin-right: 5px;"></i>COMBATTANTS</a></p>
            </div>
            <div class="column right">
                <?php
                if(!isset($_SESSION['userID'])){
                    echo "<p class=\"navbar-item\"><a href=\"login.php\" class=\"nonactive\">CONNEXION</a></p>
      <a href=\"inscription.php\" class=\"button is-rounded\" style=\"color: white; border: none; background-color: #3dc1d3;\">INSCRIPTION</a>";
                }else{
                  $user = user::getUser($_SESSION['userID']);
                  $pseudo=$user->pseudo;
                  $avatar=$user->avatar;
                    echo <<<HTML
                    <div class="dropdown is-hoverable">
            <div class="dropdown-trigger">
              <button class="button is-rounded has-text-weight-bold" style="font-family: 'Nunito', sans-serif;color: white; border: none; background-color: #3dc1d3;" aria-haspopup="true" aria-controls="dropdown-menu4">
                <img src="img/avatar/$avatar" class="avatar_header"><span>$pseudo</span>
                <span class="icon is-small">
                  <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
              </button>
            </div>
            <div class="dropdown-menu" id="dropdown-menu4" role="menu" style="left: -50px;">
              <div class="dropdown-content">
                <div class="dropdown-item">
                  <a href="compte.php" class="dropdown-item">
                  Profil
                </a>
                <hr class="dropdown-divider">
                <a href="index.php?logout" class="dropdown-item">
                  Déconnection
                </a>
                </div>
              </div>
            </div>
          </div>
HTML;
                }

                ?>
        
                <figure class="navbar-item image has-text-white">
                    <i class="fas fa-bars" style="width: 1rem; height: 1rem;"></i>
                </figure>
            </div>
        </div>
    </div>
<!-- /.hero-head -->

<!-- .hero-body -->
<div class="hero-body" style="background-color: #303952; background-image: url(img/geo.png);">
  <div class="container has-text-centered">   
    <h1 class="title toggleadd is-2 is-size-2-touch">&mdash; Les<span style="color:#3dc1d3;">Guides</span> &mdash;</h1>
  </div>
</div>
<!-- /.hero-body -->

<!-- /.hero-foot -->
<div class="hero-foot" style="background-color: #3dc1d3">
  <div class="container">
      <h1 class="title is-4">A la une</h1>
  </div>
</div>
<!-- /.hero-foot -->

</section>
<!-- /.hero -->


<?php
include "class/guide.class.php";
$guides = guide::getAll();
foreach($guides as $guide){

    $perso = $guide->perso;
    //$img = "<img src='img/personnage/$perso.png' >";
    $auteur = $guide->pseudo;   //auteur du guide
    $id = $guide->idGuide;      //id du guide accces via guide.php?id=$id
    $titre = $guide->titre;     //titre du guide
    $presentation = substr($guide->presentation,0,100); //100 premier caractere de la presentation du guide
    //echo $presentation.$img;
    echo "<br><a href='guide.php?id=$id'>$titre</a>";
}
?>


<!-- .footer -->
<section class="hero" style="background-color: #303952; color:#A2A9BD; margin-top: 50px;">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column is-4">
          <h1 class="title heading" id="title">BetterSmash</h1>
          <p style="margin-top: -20px;"><i class="fab fa-twitter-square"></i> <i class="fab fa-discord"></i></p>
        </div>
        <div class="column is-2">
          <h1 class="title heading is-footer" id="title">Membre</h1>
          <p class="heading is-footer">connexion</p>
          <p class="heading is-footer">inscription</p>
        </div>
        <div class="column is-2">
          <h1 class="title heading is-footer" id="title">Guides</h1>
          <p class="heading is-footer">liste</p>
          <p class="heading is-footer">créer un guide</p>
        </div>
        <div class="column is-2">
          <h1 class="title heading is-footer" id="title">Combattants</h1>
          <p class="heading is-footer">liste</p>
          <p class="heading is-footer">tier list</p>
        </div>
      </div>
      <div class="has-text-centered">&copy; 2019 &mdash; Mentions légales</div>
    </div>
  </div>
</section>
<!-- /.footer -->
    
  </body>
</html>