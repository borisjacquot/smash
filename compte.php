<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BetterSmash</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/debug.css"> -->
    <link rel="stylesheet" href="css/main.css">
    <script type='text/javascript' src='js/modif_SpanInput.js'></script>
  </head>
  <body>

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

<section class="hero is-dark is-shadowless is-medium">

<!-- .hero-head -->
    <div class="hero-head">
        <div class="columns is-mobile is-marginless heading has-text-weight-bold" style="background-color: #303952;">
            <div class="column left">
                <p class="navbar-item has-text-white">BetterSmash</p>
            </div>
            <div class="column center desktop">
                <p class="navbar-item " ><a href="listeGuides.php" class="nonactive"><i class="fas fa-book" style="color:#3dc1d3;margin-right: 5px;"></i>GUIDES</a></p>
                <p class="navbar-item"><a href="/" class="nonactive"><i class="fas fa-home" style="color:#3dc1d3;margin-right: 5px;"></i> ACCUEIL</a></p>
                <p class="navbar-item"><a href="listePersonnage.php" class="nonactive"><i class="fas fa-fist-raised" style="color:#3dc1d3;margin-right: 5px;"></i>COMBATTANTS</a></p>
            </div>
            <div class="column right">
HTML;
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

                echo <<<HTML
				
                <figure class="navbar-item image has-text-white">
                    <i class="fas fa-bars" style="width: 1rem; height: 1rem;"></i>
                </figure>
            </div>
        </div>
    </div>
</section>

	<div class="columns" style="margin-bottom: 0; background: #3dc1d3; color: white;">
	  <div class="container profile">
	    <div class="section profile-heading">
	      <div class="columns is-mobile is-multiline">
	        <div class="column is-2">
	          <span class="header-icon user-profile-image">
	          	<div class="item">
		          	<span class="notify-badge">ADMIN</span>
		            <img style="border-radius: 10%; height: 150px;" src="img/avatar/$avatar"/>
	        	</div>
	          </span>
	        </div>
	        <div class="column is-4-tablet is-10-mobile name">
	          <p>
	            <span class="title is-bold" onclick="toInput('pseudo','text')" id="pseudo">$pseudo</span>
	          </p>
	          <p class="tagline">
	          <span onclick="toInput('mail','mail')" id="mail">$mail</span><br>
	          <a href="logout.php" class="button is-danger is-normal is-rounded" style="margin-top: 20px;">
		        <span class="icon">
		        	<i class="fas fa-times-circle"></i>
		        </span>
		        <span>Administration</span>
		      </a>
	          </p>
	        </div>
	        <div class="column is-2-tablet is-4-mobile has-text-centered">
	          <p class="stat-val">$nbGuide</p>
	          <p class="stat-key">guides créés</p>
	        </div>
	        <div class="column is-2-tablet is-4-mobile has-text-centered">
	          <p class="stat-val">75</p>
	          <p class="stat-key">recommandations</p>
	        </div>
	        <div class="column is-2-tablet is-4-mobile has-text-centered">
	          <p class="stat-val">13</p>
	          <p class="stat-key">commentaires</p>
	        </div>
	      </div>
	    </div>

	    
	  </div>
	</div>

    <!-- <h1>Compte</h1>
        <img src="img/avatar/$avatar" width="250px"><br>
        Pseudo : <span onclick="toInput('pseudo','text')" id="pseudo">$pseudo</span><br>
        E-mail : <span onclick="toInput('mail','mail')" id="mail">$mail</span><br>
        <span>Nombre de guides créés : $nbGuide</span>
    <p>Note : En cliquant sur un des champs, il est possible de modifier sa valeur</p> -->
HTML
;
//TODO REntrer les modifs dans la BD
//todo gerer les restrictions de champs
//todo Securiser les champs contre injection SQL
?>

  </body>
</html>