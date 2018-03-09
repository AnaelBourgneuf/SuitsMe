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
        </style>
    </head>

    <body>
        <?php
        showHeader("rechercher");

        var_dump($_POST);
        $tab = [];
        if ($_POST["search"]=="Clients"){
            $tab = getLogs(1);
        }
        else if ($_POST["search"]=="Prospects"){
            $tab = getLogs(0);
        }
        else {
            $tab = getLogs();
        }
        ?>
        <table>
            <tr>
                <th>blabla</th>
                <th>blabla</th>
                <th>blablabla</th>
                <th>bla</th>
                <th>blaaa</th>
            </tr>
            <?php
            for ($i = 0; $i < sizeof($tab); $i++){
                echo "<tr>\n";
                $ID = 0;
                foreach ($tab[$i] as $key => $value){
                    echo "<td>".$value."</td>";
                    if ($key == "ID"){
                        $ID = $value;
                    }
                }
                echo "<td><a href='modif.php?ID=".$ID."'>modifier</a> </td>";
                echo "<td><a href='supp.php?ID=".$ID."'>supprimer</a> </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>