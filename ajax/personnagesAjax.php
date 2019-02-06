<?php
include '../class/myPDO.class.php';

//requete recuperation des utilisateur
if(isset($_GET['nom'])){
    $stmt = myPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM personnage
        WHERE nom LIKE ?
        ORDER BY 1;
SQL
    );
    $stmt->execute(array('%'.$_GET['nom'].'%'));
    $pseudo = $stmt->fetchAll();
    $encodedList = json_encode($pseudo);
    echo $encodedList;
}