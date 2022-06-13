<?php session_start();?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Fodéo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Nos catalogues
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="catalogue/movies.php">Films</a></li>
            <li><a class="dropdown-item" href="catalogue/series.php">Séries</a></li>
          </ul>
        </li>
        <li class="nav-item login_menu">
          <?php
            if(isset($_SESSION) && $_SESSION['connexion'] == false) {
              echo '<a class="nav-link" href="security/login.php">Se connecter</a>';
            } else if(isset($_SESSION) && $_SESSION['connexion'] == true) {
              echo '<a class="nav-link" href="security/logout.php">Se déconnecter</a>';
            }
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nous contacter</a>
        </li>
        <li class = "username_menu">
            <?php
              if(isset($_SESSION) && $_SESSION['connexion'] == true) {
                echo "Bonjour ".$_SESSION['username']." :) !";
              }
            ?>
        </li>
      </ul>
    </div>
  </div>
</nav>