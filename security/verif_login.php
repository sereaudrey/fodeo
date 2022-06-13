<?php
require('bddConfig.php');
$query = $conn->prepare("SELECT * FROM users WHERE email = ?");
$query->execute([$_POST['email']]);
$user = $query->fetch();
if(isset($_POST['email']) && isset($_POST['password'])) {
    if($user['email'] == $_POST['email']) {
        if($user['password'] == $_POST['password']) {
            session_start();
            $_SESSION['connexion'] = true;
            $_SESSION['username'] = $user['username'];
            header('Location:../index.php');
        } else {
            header('Location:login.php?message=0');
        }
    } else {
        header('Location:login.php?message=0');
    }
}
?>