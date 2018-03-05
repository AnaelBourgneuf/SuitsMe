<?php

    function getPDO(){
        try{
            return new PDO('mysql:host=localhost;dbname=db_test;charset=utf8', "root", "root");
        }
        catch(Exception $err){
            die("Debug: problème de bdd\n" . $err);
        }
    }

    function logProspect($nom, $prenom, $tel, $adr){
        $bdd = getPDO();
        $request = $bdd -> prepare("INSERT INTO `prospect`(`prospect_nom`, `prospect_prenom`, `prospect_tel`, `prospect_adresse`)
                                    VALUES (:nom, :prenom, :tel, :adr)");
        $request -> bindparam(":nom", $nom);
        $request -> bindparam(":prenom", $prenom);
        $request -> bindparam(":tel", $tel);
        $request -> bindparam(":adr", $adr);
        $request -> execute();
    }

    function showHeader(){
        echo '<header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">SuitsMe</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nouveau
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="prospect.php">Prospect</a>
                                    <a class="dropdown-item" href="RDV.php">Rendez-vous</a>
                                    <a class="dropdown-item" href="devis.php">Devis</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="recherche.php">Rechercher</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>';
    }
?>