<?php

include "functions.php";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>SuitsMe Gérer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        showHeader("rechercher");
        if (isset($_GET["ID"])) {
            $infos = getLogById($_GET["ID"])[0];
        }
        else {
            die( "Aucun log selectionné, retournez vers la <a href='recherche.php'>recherche</a>");
        }
    ?>
    <h3>Coordonnées</h3>
    <form action="prospect.php" method="post">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nom</span>
            </div>
            <input type="text" name="nom" class="form-control" placeholder="Nom" required value="<?php echo $infos["log_nom"]?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Prénom</span>
            </div>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" required value="<?php echo $infos["log_prenom"]?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Téléphone</span>
            </div>
            <input type="text" name="telephone" class="form-control" placeholder="063735..." required value="<?php echo $infos["log_tel"]?>">
        </div>
        <?php
            $parsed = explode("-", $infos["log_adresse"]);
            var_dump($parsed);
        ?>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Adresse</span>
            </div>
            <input type="text" name="numeroRue" class="form-control" placeholder="Numéro" required  value="<?php $parsed[0]?>">
            <input type="text" name="nomRue" class="form-control" placeholder="Rue" required value="<?php $parsed[1]?>">
            <input type="text" name="complementRue" class="form-control" placeholder="Complement" required  value="<?php $parsed[2]?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">Code postal</span>
            </div>
            <input type="text" name="numeroVille" class="form-control" placeholder="Code postal" required value="<?php $parsed[3]?>">
            <input type="text" name="nomVille" class="form-control" placeholder="Ville" required value="<?php $parsed[4]?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Valider</button>
    </form>
    </body>
</html>
