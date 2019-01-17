<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:49
 */

include_once "PDO.php";
class User
{
    public static function createFromAuth(array $data) {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
				SELECT *
				FROM user
				WHERE login = ? AND sha512pass = ?;
SQL
        );
        $stmt->execute(array($_POST["login"], hash("sha512", $_POST["pass"])));
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        if(($object = $stmt->fetch()) !== false) {
            Session::start();
            $_SESSION["connected"] = true;
            return $object;
        }
        throw new Exception("L'utilisateur n'existe pas !");
    }

    //Insertion membre
    public static function addUser($pseudo,$mdp,$mail) {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
        INSERT 
        INTO user(pseudo,mdp,mail)
        VALUES (:pseudo,:mdp,:mail);
SQL
        );
        try{
            $stmt->execute(array(
                'pseudo'=>$pseudo,
                'mdp'=>$mdp,
                'mail'=>$mail
            ));
            echo "Votre compte à bien été créer";
        }
        catch (Error $e){
            echo "Erreur, lors de la création du compte.<br>$e";
        }


    }


}