<?php
    session_start();
    $_SESSION['connexion'] = false;
    $_SESSION['username'] = '';
    header('Location:../index.php');
?>