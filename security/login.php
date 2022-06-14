<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" />
    <title>Se connecter</title>
</head>
<body>
    <form action="verif_login.php" method="POST">
        <div class="box-login">
            <div class=" login mail">
                <span>Email : </span>
                <input class="input-login" name="email" type="email" required/>
            </div>
            <div class="login password">
                <span>Mot de passe : </span>
                <input class="input-login" name="password" type="password" required/>
            </div>
            <a href="register.php"><input class="btn btn-subscribe" type="button" value="S'inscrire" /></a>
            <input class="btn btn-login" type="submit" value="Se connecter">
        </div>
    </form>
    <?php
        session_start();
        if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
</body>
</html>