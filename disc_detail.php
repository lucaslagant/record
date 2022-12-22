<?php
require "db.php";
$db = connexionBase();
$id = $_GET["id"];
$requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
$requete->execute(array($id));
$myDisc = $requete->fetch(PDO::FETCH_OBJ);

$requete->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Disc - Détail</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row p-3">
            <h1 class="col-10">Détail des disques</h1>
            <a href="discs.php" class="btn btn-primary col-2">Retour</a>
        </div>
        <table>
            <tr>
                <td class="p-3">
                    <span class="fs-3" hidden><?=$myDisc->disc_id?></span>
                </td>
                <td class="p-3"><img src="upload/<?=$myDisc->disc_picture?>" class="w-50"></td>
                <td class="p-3">
                    <span class="fs-3"><?=$myDisc->disc_title?></span>
                </td>
                <td class="p-3">
                    <span class="fs-3"><?=$myDisc->artist_name?></span>
                </td>
                <td class="p-3">
                    <span class="fs-3">Label : </span><?=$myDisc->disc_label?>
                </td>
                <td class="p-3">
                    <span class="fs-3">Year : </span><?=$myDisc->disc_year?>
                </td>
                <td class="p-3">
                    <span class="fs-3">Genre :</span><?=$myDisc->disc_genre?>
                </td>
                <td>
                    <span class="fs-3">Prix :</span><?=$myDisc->disc_price?>€
                </td>                                          
            </tr>
        </table>
        <div class="d-flex justify-content-center">
            <a href="disc_form.php?id=<?= $myDisc->disc_id ?>" class="btn btn-primary m-1">Modifier</a>
            <a href="disc_delete_ctrl.php?id=<?= $myDisc->disc_id?>" class="btn btn-primary m-1">Supprimer</a>
        </div>
       
    </div>        
</body>
</html>