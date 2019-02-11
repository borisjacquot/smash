<?php
require_once "myPDO.class.php";
class Guide
{
//Insertion guide
    public static function addGuide($user,$perso,$pres,$combo,$url="") {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
        INSERT 
        INTO guide(idUser,idPersonnage,presentation,combo,URLVideo)
        VALUES (?,?,?,?,?);
SQL
        );
        try{
            $stmt->execute(array(
                $user,$perso,$pres,$combo,$url
            ));
            echo "<div>Guide créé avec succès</div>";
        }
        catch (Error $e){
            echo $e;
        }
    }

    public static function getAll(){
        $stmt = myPDO::getInstance()->prepare(<<<SQL
        SELECT guide.idGuide, guide.titre, guide.presentation, user.pseudo, personnage.nom as perso
        FROM guide INNER JOIN user on guide.idUser = user.idUser
        INNER JOIN personnage on guide.idPersonnage = personnage.idPersonnage;
SQL
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $res = $stmt->fetchAll(); //tableau avec tous tes retours
        if(count($res) > 0)return $res;
        throw new Exception("...");
    }
}