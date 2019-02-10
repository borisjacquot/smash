<?php
class guide
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
}