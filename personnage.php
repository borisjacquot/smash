<?php
if(!isset($_GET['id'])){
    header("Location: listePersonnage.php");
}
?>

<?php
//require "class/autoload.include.php";
include "class/personnage.class.php";
$perso = Personnage::createFromId($_GET['id']);
$nom = $perso->nom;
$origine = $perso->origine;
$Atq1Nom = $perso->atq1Nom;
$Atq1Desc = $perso->atq1Desc;

$Atq2Nom = $perso->atq2Nom;
$Atq2Desc = $perso->atq2Desc;

$Atq3Nom = $perso->atq3Nom;
$Atq3Desc = $perso->atq3Desc;

$Atq4Nom = $perso->atq4Nom;
$Atq4Desc = $perso->atq4Desc;

$Atq5Nom = $perso->atq5Nom;
$Atq5Desc = $perso->atq5Desc;
echo <<<HTML
    <h1>$nom</h1>
    <h3>Origine : $origine</h3>
    <img src="img/personnage/$nom.png" alt="">
    <table>
        <tr>
            <tr><td rowspan=2>B</td><td rowspan=2>IMAGE ATQ1</td><td>$Atq1Nom</td></tr>
            <tr><td>$Atq1Desc</td></tr>
        </tr>
        <tr>
            <tr><td rowspan=2>< >B</td><td rowspan=2>IMAGE ATQ2</td><td>$Atq2Nom</td></tr>
            <tr><td>$Atq2Desc</td></tr>
        </tr>
        <tr>
            <tr><td rowspan=2>UP B</td><td rowspan=2>IMAGE ATQ3</td><td>$Atq3Nom</td></tr>
            <tr><td>$Atq3Desc</td></tr>
        </tr>
        <tr>
            <tr><td rowspan=2>Bottom B</td><td rowspan=2>IMAGE ATQ4</td><td>$Atq4Nom</td></tr>
            <tr><td>$Atq4Desc</td></tr>
        </tr>
        <tr>
            <tr><td rowspan=2>ULT</td><td rowspan=2>IMAGE ATQ4</td><td>$Atq5Nom</td></tr>
            <tr><td>$Atq5Desc</td></tr>
        </tr>
        
    </table>
HTML;
?>
