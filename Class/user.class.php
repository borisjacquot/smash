<?php

require_once "myPDO.class.php";


class User
{
    public static function createFromAuth($pseudo,$mdp) {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
				SELECT idUser
				FROM user
				WHERE pseudo = ? AND mdp = ?;
SQL
        );
        $mdp = hash("sha512", $mdp);
        $stmt->execute(array(
            $pseudo, $mdp
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        if(($object = $stmt->fetch()) !== false) {
            return $object;
        }
        else{
            return null;
        }
    }
    //Ajoute token a l'id du membre correspondant
    public static function addTokenAuth($id,$token){
        $stmt = myPDO::getInstance()->prepare(<<<SQL
				UPDATE user
				SET token = ?
				WHERE idUser = ?;
SQL
        );
        $stmt->execute(array(
            $token, $id
        ));
    }


    //Supprime tout les tokens de la BD
    public static function delTokenAuth(){
        $stmt = myPDO::getInstance()->prepare(<<<SQL
				UPDATE user
				SET token = 0;
SQL
        );
        $stmt->execute();
    }


    //Verifie si un pseudo est utilisé
    public static function verifToken($token,$id)
    {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM user
        WHERE idUser =  ? AND token = ?;
SQL
        );
        $stmt->execute(array(
            $id,$token
        ));
        if(($object = $stmt->fetch()) !== false){
            return true;
        }
        return false;
    }


    //Verifie si un pseudo est utilisé
    public static function pseudoUse($pseudo)
    {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
        SELECT pseudo
        FROM user
        WHERE pseudo = :pseudo;
SQL
        );
        $stmt->execute(array(
            'pseudo' => $pseudo
        ));
        if($stmt == null){
            return true;
        }
        return false;
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
                'mdp'=>hash("sha512", $mdp),
                'mail'=>$mail
            ));
            echo "Votre compte à bien été créer";
        }
        catch (Error $e){
            echo "Erreur, lors de la création du compte.<br>$e";
        }


    }

    public static function getUser($id){
        $stmt = myPDO::getInstance()->prepare(<<<SQL
            SELECT pseudo, mail, count(guide.idGuide) as nbGuide
            FROM user,guide
            WHERE guide.idUser = user.IdUser and user.idUser = ?
SQL
        );
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        if(($object = $stmt->fetch()) !== false) {
            return $object;
        }
    }

}