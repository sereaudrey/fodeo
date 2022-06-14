<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Fodéo</title>
</head>
<body>
    <div class="header">
        <a href="index.php">
            <img src="../image/logo.png" alt="Logo du site" class="logo"></a>
        </a>
        <span class="login"><a href="../security/login.php"><i class="fas fa-user"></i></a></span>
    </div>
    <?php 
    require('../menu.php'); 
    require('../security/bddConfig.php');
    ?>
    <h2>Voici notre catalogue de films</h2>
    <?php
    //On récupère les données des films
    $films = $conn->query('SELECT * FROM movies WHERE type="Movie" ORDER BY title ASC');
    while($donnees = $films->fetch()) {
        ?>
        <div class="movies">
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
    $films->closeCursor();
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>