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
       if($_GET["message"]==0) {
            echo "Identifiants incorrects";
       } else {
            echo "Votre compte a bien été créé !";
       }
        
        // if (isset($_POST['username'])){
        //     $username = stripslashes($_REQUEST['email']);
        //     $username = mysqli_real_escape_string($conn, $username);
        //     $password = stripslashes($_REQUEST['password']);
        //     $password = mysqli_real_escape_string($conn, $password);
        //     $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
        //     $result = mysqli_query($conn,$query) or die();
        //     $rows = mysqli_num_rows($result);
        //     if($rows==1){
        //         $_SESSION['username'] = $username;
        //         header("Location: index.php");
        //     }else{
        //         $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        //     }
        // }
    ?>
</body>
</html>