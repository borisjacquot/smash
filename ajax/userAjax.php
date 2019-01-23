<?php
include '../class/myPDO.class.php';

//requete recuperation des utilisateur
if(isset($_GET['pseudo'])){
    $stmt = myPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM user
        WHERE pseudo LIKE ?
        ORDER BY pseudo;
SQL
    );
    $stmt->execute(array('%'.$_GET['pseudo'].'%'));
    $pseudo = $stmt->fetchAll();
    $encodedList = json_encode($pseudo);
    echo $encodedList;
}

//Requete BAN
if(isset($_GET['ban']) && isset($_GET['idUser'])){
    $stmt = myPDO::getInstance()->prepare(<<<SQL
        UPDATE user
        SET ban = ?
        WHERE idUser = ?; 
SQL
    );
    $stmt->execute(array($_GET['ban'],$_GET['idUser']));
    echo $_GET['ban'];
}

//Requete Rang
if(isset($_GET['rang']) && isset($_GET['idUser'])){
    $stmt = myPDO::getInstance()->prepare(<<<SQL
        UPDATE user
        SET rang = ?
        WHERE idUser = ?; 
SQL
    );
    $stmt->execute(array($_GET['rang'],$_GET['idUser']));
    echo $_GET['rang'];
}
?>