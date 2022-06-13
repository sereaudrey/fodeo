<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Fodéo</title>
</head>
<body>
    <?php 
    require('../menu.php'); 
    require('../security/bddConfig.php');
    ?>
    <h2>Voici notre catalogue de séries</h2>
    <?php
    //Connexion à la base de données
    // try {
    //     $bdd = new PDO('mysql:host=localhost;dbname=bliniz;charset=utf8', 'root');
    //     echo('Connexion réussie !');
    // } catch(Exception $e) {
    //     die('Erreur : '.$e->getMessage());
    // }

    //On récupère les données des films
    $series = $bdd->query('SELECT * FROM movies WHERE type="Serie" ORDER BY title ASC');

    while($donnees = $series->fetch()) {
    ?>
    <div class="series">
        <h3>
            <?php echo($donnees['title']);?>
        </h3>
        <span>Genre : <?php echo($donnees['genre']);?></span> <br>
        <span>Date de sortie : <?php echo($donnees['release_date']);?></span><br>
        <span>Réalisateurs : <?php echo($donnees['directors']);?></span><br>
        <span>Acteurs : <?php echo($donnees['actors']);?></span><br>
        <span>Synopsis : <?php echo($donnees['synopsis']);?></span><br>
        <span>Note des spectateurs : <?php echo($donnees['rate']);?>/5</span><br>
        <span>Disponible sur la plateforme suivante : <?php echo($donnees['platform_name']);?></span><br>
        <span><?php echo($donnees['platform_availability']);?></span><br>
        
    </div>
    <?php
    }
    $series->closeCursor();
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>