<?php
require "db.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
$requete ->execute(array($_GET["id"]));
$myDisc = $requete ->fetch(PDO::FETCH_OBJ);
$requete->closeCursor();
// var_dump($myDisc);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Modif form</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row p-3">
            <h1 class="col-10">Disque n°<?=$myDisc->disc_id?></h1>
            <a href="disc_detail.php?id=<?=$myDisc->disc_id?>" class="btn btn-primary col-2">Retour</a>
        </div>
        <form action="disc_modif_ctrl.php" method="post" enctype="multipart/form-data">            
            <label for="title">Titre :</label><br>
            <input type="text" name="id" value="<?=$myDisc->disc_id?>" hidden>
            <input type="text" placeholder="Entrez un titre" class="col-12" name="title" value="<?= $myDisc->disc_title?>">
            <label for="artist" class="mt-1">Artiste :</label><br>
            <input type="text" placeholder="Entrez un artiste" class="col-12" name="artist" value="<?= $myDisc->artist_name?>">
            <label for="year" class="mt-1">Année :</label><br>
            <input type="text" placeholder="Entrez une année" class="col-12" name="year" value="<?= $myDisc->disc_year?>">
            <label for="genre" class="mt-1">Genre :</label><br>
            <input type="text" placeholder="Entrez un genre" class="col-12" name="genre" value="<?= $myDisc->disc_genre?>">
            <label for="label" class="mt-1">Label :</label><br>
            <input type="text" placeholder="Entrez un label" class="col-12" name="label" value="<?= $myDisc->disc_label?>">
            <label for="price" class="mt-1">Price :</label><br>
            <input type="text" class="col-12" name="price" value="<?= $myDisc->disc_price?>">
            <label for="price" class="mt-1">Picture :</label><br>
            <input type="file" name="file">
            <?php 
                $req = $db->query('SELECT disc_picture FROM disc');
                    echo "<img src='".$myDisc->disc_picture."'><br>";
            ?>
            <br><br>
            <input class="btn btn-primary" type="submit" value="Modifier">
            <input class="btn btn-primary" type="reset" value="Annuler">
        </form>    
    </div>
</body>
</html>