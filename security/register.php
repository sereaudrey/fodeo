<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registration.css" />
    <title>Inscription</title>
</head>
<body>
    <form class="registration" id="formRegistration" action="verif_register.php" method="POST">
        <div class="register">
            <span>Choisissez un pseudo : *</span>
            <input type="text" name="username" required />
        </div>
        <div class="register">
            <span>Email : *</span>
            <input type="email" name="email" required>
        </div>
        <div class="register">
            <span>Choisissez un mot de passe : *</span>
            <input type="password" name="password" required />
        </div>
        <div class="register">
            <span>Saisissez une deuxième fois votre mot de passe : *</span>
            <input type="password" name="confirmPassword" required>
        </div>
        <div class="register">
            <span>Quel est votre date de naissance ? *</span>
            <input type="date" name="birthday" required />
        </div>
        <div class="button_register">
            <input type="submit" name="formRegister" class="btn-register" value="S'inscrire">
            <input type="button" href="login.php" value="Se connecter">
        </div><br>
    </form>
    <div class="message-error">
        <?php
        session_start();
        if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    </div>
</body>
</html>