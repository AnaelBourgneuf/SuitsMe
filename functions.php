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
        $request = $bdd -> prepare("INSERT INTO `log`(`log_is_client`, `log_nom`, `log_prenom`, `log_tel`, `log_adresse`)
                                    VALUES (0, :nom, :prenom, :tel, :adr)");
        $request -> bindparam(":nom", $nom);
        $request -> bindparam(":prenom", $prenom);
        $request -> bindparam(":tel", $tel);
        $request -> bindparam(":adr", $adr);
        $request -> execute();
    }

    function writeDevis($patron, $matiere, $technique, $prodTime, $log){
        $bdd = getPDO();
        $request = $bdd -> prepare("INSERT INTO `devis`(`devis_patron`, `devis_mat_oeuvre`, `devis_tech`, `devis_temps_prod`, `log_ID`)
                                    VALUES (:patron, :matiere, :technique, :devis_temp_prod, :log)");
        $request -> bindparam(":patron", $patron);
        $request -> bindparam(":matiere", $matiere);
        $request -> bindparam(":technique", $technique);
        $request -> bindparam(":devis_temp_prod", $devis_temp_prod);
        $request -> bindparam(":log", $log);
        $request -> execute();
    }

    function getDevis($logID){
        $bdd = getPDO();
        return $bdd -> query("SELECT * FROM `devis` WHERE log_ID =" . $logID) -> fetchAll(PDO::FETCH_ASSOC);
    }

    function getLogs($logType){
        $bdd = getPDO();
        if($logType != null){
            return $bdd -> query("SELECT * FROM `log` WHERE `log_is_client` =" . $logType ) -> fetchAll(PDO::FETCH_ASSOC);
        } else{
            return $bdd -> query("SELECT * FROM `log`") -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function getLogByID($logID){
        $bdd = getPDO();
        return $bdd -> query("SELECT * FROM `log` WHERE log_ID =" . $logID) -> fetchAll(PDO::FETCH_ASSOC);
    }

    function valideDevis($logID){
        $bdd = getPDO();
        $bdd -> query("UPDATE `devis` SET `devis_valide`= 1 WHERE log_ID =" . $logID);
        $bdd -> query("UPDATE `log` SET `log_is_client`= 1 WHERE log_ID =" . $logID);
    }

    function showHeader($name){
        echo '<header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">SuitsMe</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item'; if ($name == "accueil"){ echo ' active';} echo '">
                                <a class="nav-link" href="index.php">Accueil' ;
                                    if ($name == "accueil"){
                                        echo '<span class="sr-only">(current)</span>';
                                    }

                            echo '</a>
                            </li>
                            <li class="nav-item dropdown'; if ($name == "new"){ echo ' active';} echo '">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nouveau' ;
                                    if ($name == "new"){
                                        echo '<span class="sr-only">(current)</span>';
                                    }

                            echo '</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="prospect.php">Prospect</a>
                                    <a class="dropdown-item" href="RDV.php">Rendez-vous</a>
                                    <a class="dropdown-item" href="devis.php">Devis</a>
                                </div>
                            </li>
                            <li class="nav-item'; if ($name == "rechercher"){ echo ' active';} echo '">
                                <a class="nav-link" href="recherche.php">Rechercher' ;
                                    if ($name == "rechercher"){
                                        echo '<span class="sr-only">(current)</span>';
                                    }

                            echo '</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>';
    }
?>