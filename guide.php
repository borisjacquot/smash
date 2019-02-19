<?php
if(!isset($_GET['id'])){
    header("Location: listeGuides.php");
}
include 'class/guide.class.php';
$id=$_GET['id'];
$guide = guide::getGuide($id);
$pseudo = $guide->pseudo;
$perso = $guide->personnage;
$presentation = $guide->presentation;
$combo=$guide->combo;
$video = $guide->video;

echo<<<HTML
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

Guide du personnage : $perso <br>
par : $pseudo

<h1>Présentation</h1>
$presentation
<h1>Combo</h1>
HTML;
$comboSplit = preg_split("/[\s,]+/", $combo);
$renduCombo ="";
for ($i =0; $i<sizeof($comboSplit);$i++){
    switch ($comboSplit[$i]){
        case "+":
            $renduCombo .= "<div class=\"fas fa-plus\" style='font-size:30px; margin: 1px;')></div>";
            break;
        case "UP":
            $renduCombo .= "<img src=\"img/boutons/switch/up.png \">";
            break;
        case "LEFT":
            $renduCombo .= "<img src=\"img/boutons/switch/left.png\">";
            break;
        case "RIGHT":
            $renduCombo .= "<img src=\"img/boutons/switch/right.png\">";
            break;
        case "DOWN":
            $renduCombo .= "<img src=\"img/boutons/switch/down.png\">";
            break;
        case "A":
            $renduCombo .= "<img src=\"img/boutons/switch/a.png\">";
            break;
        case "B":
            $renduCombo .= "<img src=\"img/boutons/switch/b.png\">";
            break;
        case "Y":
            $renduCombo .= "<img src=\"img/boutons/switch/y.png\">";
            break;
        case "X":
            $renduCombo .= "<img src=\"img/boutons/switch/x.png\">";
            break;
        default :
                echo $comboSplit[$i];
    }
}
echo "<div>$renduCombo</div>";
if($video!==""){//si il y a une video on affiche la suite
    echo<<<HTML
    
    <h2>Vidéo</h2>
    urlVideo : $video

HTML;
}