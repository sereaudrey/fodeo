<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/accueil.css">
    <title>Fodéo</title>
</head>
<body>
    <div class="header">
        <a href="index.php">
            <img src="image/logo.png" alt="Logo du site" class="logo"></a>
        </a>
        <span class="login"><a href="security/login.php"><i class="fas fa-user"></i></a></span>
    </div>
    <?php include('menu.php'); ?>
    <h1>Bienvenue sur le site Fodéo !</h1>
    <main class="container">
        <div class="tuile_accueil">
            <div class="tuile-anim">
                <a href="catalogue/movies.php">
                    <span>Consulter le catalogue des films</span><br>
                    <i class="fas fa-film"></i>
                </a>
            </div>
        </div>
        <div class="tuile_accueil">
            <div class="tuile-anim">
                <a href="catalogue/series.php">
                    <span>Consulter le catalogue des séries</span><br>
                    <i class="fas fa-video"></i>
                </a>
            </div>
        </div>
        <div class="tuile_accueil">
            <div class="tuile-anim">
                <a href="">
                    <span>Accéder à mon tableau de bord</span><br>
                    <i class="fas fa-address-card"></i>
                </a>
            </div>
        </div>
        <div class="tuile_accueil">
            <div class="tuile-anim">
                <a href="">
                    <span>Nous contacter</span><br>
                    <i class="fas fa-file-signature"></i>
                </a>
            </div>
        </div>
</main>
<footer>
    <div class="contact"><a href="">Nous contacter </a></div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>