<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 18/01/2019
 * Time: 14:34
 */

require "Class/user.class.php";
require_once "Class/Session.class.php";
Session::start();

if(isset($_POST['logout'])){
    session_destroy();
    $_SESSION['userID'] ="";
    echo "Deconnexion réussie";
}

echo <<<HTML
    <form action="#" method=POST>
			<input type='submit' name="logout">
	</form>

HTML;
