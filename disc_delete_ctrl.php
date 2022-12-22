<?php


    if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0) GOTO TrtRedirection;
    require "db.php";
    $db = connexionBase();

    try {
        $requete = $db->prepare("DELETE FROM disc WHERE disc_id = ?");
        $requete->excute(array($_GET["id"]));
        $requete->execute();
        $requete->closeCursor();
    } catch (\Throwable $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    }
    
    TrtRedirection:
    header("Location: discs.php");
    exit;


?>