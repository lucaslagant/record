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
?>

