<?php
//Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=fodeo;charset=utf8', 'root');
    // echo('Connexion réussie !');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
?>