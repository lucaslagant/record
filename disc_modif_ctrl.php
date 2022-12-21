<?php

// Récup des valeurs 
$id = (isset($_POST['id']) && $_POST['id'] !="") ? $_POST['id'] : Null;
$title = (isset($_POST['title']) && $_POST['title'] !="") ? $_POST['title'] : Null;
// $artist = (isset($_POST['artist']) && $_POST['artist'] !="") ? $_POST['artist'] : Null;
$year = (isset($_POST['year']) && $_POST['year'] !="") ? $_POST['year'] : Null;
$genre = (isset($_POST['genre']) && $_POST['genre'] !="") ? $_POST['genre'] : Null;
$label = (isset($_POST['label']) && $_POST['label'] !="") ? $_POST['label'] : Null;
$price = (isset($_POST['price']) && $_POST['price'] !="") ? $_POST['price'] : Null;
if (isset($_FILES['picture']['picture_name'])) {
   $retour = copy($_FILES['picture']['picture_name'],$_FILES['picture']['name']);
   if ($retour) {
    echo '<p>La photo a bien été envoyé.</p>';
    echo '<img src="'.$_FILES['photo']['name'] . '">';
   }
}


// Si erreur envoie vers form 
if ($id == Null) {
    header("Location: discs.php");
}
elseif ($title == Null || $year == Null || $genre == Null || $label == Null || $price == Null ) {
    header("Location: disc_form.php?id=".$id);
    exit;
}

// Verif des données est ok 
require "db.php";
$db = connexionBase();

try {
    $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, disc_genre = :genre, disc_label = :label, disc_price = :price, disc_picture = :picture WHERE disc_id = :id");
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->bindValue(":title", $title, PDO::PARAM_STR);
    $requete->bindValue(":year", $year, PDO::PARAM_INT);
    $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requete->bindValue(":label", $label, PDO::PARAM_STR);
    $requete->bindValue(":price", $price, PDO::PARAM_STR);
    $requete->bindValue(":picture", $picture, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
} 
catch (Exception $e) {
    echo "Erreur :" . $requete->errorInfo() . "<br>";
   // die("Fin du script (disc_modif_ctrl.php)");
}


//  OK => disc_detail.php 
header("Location: disc_detail.php?id=".$id);
exit;