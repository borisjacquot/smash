<?php

require_once "myPDO.class.php";


class Personnage
{
    public static function createFromId($id) {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
				SELECT *
				FROM personnage
				WHERE idPersonnage = ?;
SQL
        );
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        if(($object = $stmt->fetch()) !== false) {
            return $object;
        }
        else{
            return null;
        }
    }


    public static function getAll() {
        $stmt = myPDO::getInstance()->prepare(<<<SQL
				SELECT *
				FROM personnage;
SQL
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $res = $stmt->fetchAll(); //tableau avec tous tes retours
        if(count($res) > 0)return $res;
        throw new Exception("...");
    }
}