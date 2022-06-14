<?php
session_start();
require('bddConfig.php');
//on prepare la requete
$query = $conn->prepare("SELECT * FROM users WHERE email = ?");
//on l'execute avec le mail renseigné
$query->execute([$_POST['email']]);
$user = $query->fetch();
//On fait une vérification
if(isset($_POST['email']) && isset($_POST['password'])) {
    //Si l'email existe en base
    if($user['email'] == $_POST['email']) {
        //si le mot de passe correspond à celui de la base
        if($user['password'] == $_POST['password']) {
            $_SESSION['connexion'] = true;
            $_SESSION['username'] = $user['username'];
            header('Location:../index.php');
        } else {
            $_SESSION['message'] = "Votre mot de passe est incorrecte";
            header('Location:login.php');
        }
    //si l'email n'existe pas on renvoie sur la page de login avec un message d'erreur
    } else {
        $_SESSION['message'] = "Cet email n'existe pas";
        header('Location:login.php');
    }
}
?>