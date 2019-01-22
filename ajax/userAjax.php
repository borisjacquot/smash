<?php
include '../class/myPDO.class.php';
if(isset($_GET['pseudo'])){
    $stmt = myPDO::getInstance()->prepare(<<<SQL
        SELECT pseudo
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
?>