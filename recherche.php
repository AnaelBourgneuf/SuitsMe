<?php include "functions.php"; ?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>SuitsMe Recherche</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <style>
            label
            {
                margin-left: 5px;
            }

            label , p
            {
                font-size: 2em;
            }
        </style>
    </head>

    <body>
        <?php
        showHeader("rechercher");
        ?>
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 20px;">
            <form action="result.php" method="post">
                <p>Rechercher dans :</p>
                <div class="form-check">
                    <input class="form-check-input position-static" type="radio" name="search" id="Clients" value="Clients" aria-label="Clients"><label for="Clients"> Clients</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input position-static" type="radio" name="search" id="Prospects" value="Prospects" aria-label="Prospects"><label for="Prospects"> Prospects</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input position-static" type="radio" name="search" id="Tous" value="Tous" aria-label="Tous" checked><label for="Tous"> Tous</label>
                </div>
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="nom" style="margin: 2vh;" required>
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
                </div>
            </form>
        </div>
    </body>
</html>