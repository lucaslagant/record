<?php
if (isset($_POST['title']) && $_POST['title'] != "") {
    $title = $_POST['title'];
}
else {
    $title = null;
}
if (isset($_POST['selectArtist']) && $_POST['selectArtist'] != "") {
    $selectArtist = $_POST['selectArtist'];
}
else {
    $selectArtist = null;
}
if (isset($_POST['year']) && $_POST['year'] != "") {
    $year = $_POST['year'];
}
else {
    $year = null;
}
if (isset($_POST['genre']) && $_POST['genre'] != "") {
    $genre = $_POST['genre'];
}
else {
    $genre = null;
}
if (isset($_POST['label']) && $_POST['label'] =! "") {
    $label = $_POST['label']; 
}
else {
    $label = null;
}
if (isset($_POST['price']) && $_POST['price'] =! "") {
    $price = $_POST['price']; 
}
else {
    $price = null;
}
if (isset($_POST['picture']) && $_POST['picture'] =! "") {
    $picture = $_POST['picture']; 
}
else {
    
    $picture = null;
}



if ($title == Null || $selectArtist == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $picture == Null) {
    header("Location: disc_new.php");
    exit;
}

require "db.php";
$db = connexionBase();
try {    
    $requete = $db->prepare("INSERT INTO disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price, disc_picture) VALUES (:title, :year, :genre, :label, :price, :picture)");

    $requete->bindValue(":title", $title, PDO::PARAM_STR);
    $requete->bindValue(":artist", $selectArtist, PDO::PARAM_INT);
    $requete->bindValue(":year", $year, PDO::PARAM_INT);
    $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requete->bindValue(":label", $label, PDO::PARAM_STR);
    $requete->bindValue(":price", $price, PDO::PARAM_STR);
    $requete->bindValue(":picture", $picture, PDO::PARAM_STR);

    $requete->execute();

    $requete->closeCursor();


}
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (disc_ajout_ctrl.php)");
}

header("Location: discs.php");

exit;

?>