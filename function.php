<?php

    function connexion(){
        // paramètre de connexion
        $HOST = 'localhost';
        $USERNAME = 'root';
        $PASSWORD = '';
        $DBNAME = 'bliniz';
        $conn = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DBNAME);
    
        // on vérifie la connexion
        if(!$conn){
            die("La connexion a échoué: " . mysqli_connect_error());
        }
        // echo 'connexion réussie !';
        return $conn;
    }

    function EnvoyerRequete($Requete){
        
            //echo "<br />requete : $Requete à la connexion :$Connexion<br />";
            $resRequete = mysqli_query(connexion(),$Requete);
            if (!$resRequete)
            {
                die("<br /><b>Requête invalide :  $resRequete</b><br />" . mysqli_error(connexion()));
                return 0;
            }
            return $resRequete;
    }

    function getDataMovie(){

        //on crée la connexion à la base
        $connexion = connexion();

        // requête Films
        // $get_movie = "SELECT * FROM `movies` WHERE `type` = 'Movie' AND `title` = '$title_movie' ORDER BY `type` ASC";
        $get_movie = "SELECT * FROM `movies` WHERE `type` = 'Movie' ORDER BY `type` ASC";
        $rqt_movie = EnvoyerRequete($get_movie);

        $resMysqli_movie = mysqli_fetch_array($rqt_movie);

        return $resMysqli_movie;
    }

    

    function getDataSeries(){
        //on crée la connexion à la base
        $connexion = connexion();

        // requête Série
        // $get_series = "SELECT * FROM `movies` WHERE `type` = 'Serie' AND `title` = '$title_series' ORDER BY `type` ASC";
        $get_series = "SELECT * FROM `movies` WHERE `type` = 'Serie' ORDER BY `type` ASC";
        $rqt_series = EnvoyerRequete($get_series);

        // tableau des datas
        $mysqli_series = mysqli_fetch_array($rqt_series);

        return $mysqli_series;
    }

?>