<?php

    include "functions.php";
    
    if (isset($_POST["submit"])){
        $patron = htmlspecialchars($_POST["patron"]);
        $matiere = htmlspecialchars($_POST["matiere"]);
        $technique = htmlspecialchars($_POST["technique"]);
        $devis_temp_prod = htmlspecialchars($_POST["prodTime"]);
        $log = htmlspecialchars($_POST["log"]);
        writeDevis($patron, $matiere, $technique, $devis_temp_prod, $log);
    }

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>SuitsMe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    showHeader("new");
    ?>
    <form action="" method="post">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Client</label>
            </div>
            <select name="log" class="form-control" id="exampleFormControlSelect2">
                <?php
                    $logs = getLogs();
                    foreach($logs as $log){
                        $str = "<option ";
                        if (isset($_GET["ID"])){
                            $str .= "selected ";
                        }
                        $str .= "value='" . $log["log_ID"] . "'>" . $log["log_nom"] . "</option>";
                        echo $str;
                    }
                ?>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Patron</span>
            </div>
            <input type="file" name="patron" class="form-control" required>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Matière d'oeuvre</span>
            </div>
            <input type="text" name="matiere" class="form-control" placeholder="Matière d'oeuvre" required>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Technique</span>
            </div>
            <input type="text" name="technique" class="form-control" placeholder="Technique" required>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Temp de production</span>
            </div>
            <input type="text" name="prodTime" class="form-control" placeholder="En heure" required>
        </div>
        <button type="submit" name="submit" class="btn btn-warning">Valider</button>
    </form>
</body>
</html>