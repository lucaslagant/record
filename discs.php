<?php
include "db.php";
$db = connexionBase();
$requete = $db->query("SELECT * FROM `disc` JOIN `artist` ON disc.artist_id = artist.artist_id;");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
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
    <title>Discs</title>
</head>
<body>
    <div class="container-fluid">      
        <div class="row p-3">
            <h1 class="col-10">Liste des disques (15)</h1>
            <a href="disc_new.php" class="btn btn-primary col-2">Ajouter</a>
        </div>
        <table> 
        <?php foreach ($tableau as $disc):?>
            <tr>
                <!-- <td><img src="<?=$disc->disc_picture?>" class="w-50"></td> -->
                <td class="fs-6">
                <span class="fs-1"><?=$disc->disc_title?></span><br>
                <span class="fs-2"><?=$disc->artist_name?></span><br>              
                <span class="fw-bold">Label : </span> <?=$disc->disc_label?><br>              
                <span class="fw-bold">Year : </span> <?=$disc->disc_year?><br>               
                <span class="fw-bold">Genre :</span> <?=$disc->disc_genre?><br>
                <a href="disc_detail.php?id=<?= $disc->disc_id?>" class="btn btn-primary mt-5 text-center">Détails</a></td>
            </tr>
            <?php endforeach; ?>
        </table>           
    </div>


</body>
</html>