<?php include "functions.php"; ?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>SuitsMe Recherche - result</title>
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

            td, th {
                border: 2px solid black;
                padding: 0px 10px;
            }

            table {
                border-collapse: collapse;
            }
        </style>
    </head>

    <body>
        <?php
        showHeader("rechercher");

        //var_dump($_POST);
        $tab = [];
        $logSearch = $_POST["logSearch"];
        if ($logSearch == ""){
            $logSearch = null;
        }
        if ($_POST["search"]=="Clients"){
            $tab = getLogs(1,$logSearch);
        }
        else if ($_POST["search"]=="Prospects"){
            $tab = getLogs(0,$logSearch);
        }
        else {
            $tab = getLogs(null,$logSearch);
        }
        ?>
        <table>
            <tr>
                <th style="border-radius: 2px 0px 0px 0px;">Client/Prospect</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th style="border-radius: 0px 0px 2px 0px;">Telephone</th>
            </tr>
            <?php
            for ($i = 0; $i < sizeof($tab); $i++){
                echo "<tr>\n";
                $ID = 0;
                foreach ($tab[$i] as $key => $value){
                    if ($key == "log_ID"){
                        $ID = $value;
                    }
                    else if ($key == "log_is_client"){
                        if ($value == 0){
                            echo "<td>Prospect</td>";
                        }
                        else {
                            echo "<td>Client</td>";
                        }
                    }
                    else {
                        echo "<td>".$value."</td>";
                    }
                }
                echo "<td><a href='gerer.php?ID=".$ID."'>gérer</a> </td>";
                echo "<td><a href='supp.php?ID=".$ID."'>supprimer</a> </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>