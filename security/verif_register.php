<?php
session_start();
    require('bddConfig.php');
    //Si le formulaire est valide
    if(isset($_POST['formRegister'])) {
        //Déclaration des variables
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $confirmPassword = sha1($_POST['confirmPassword']);
        $birthday = htmlspecialchars($_POST['birthday']);
        $dateCreate = date('y-m-d');

        //On vérifie si les champs sont remplis
        if(!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['birthday'])) {
           //On vérifie si le mail existe déjà dans la bdd
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailBdd = $conn->prepare("SELECT email FROM users WHERE email = ?");
                $emailBdd->execute(array($email)); 
                $emailExist = $emailBdd->rowCount();
                //Si l'email n'existe pas dans la bdd
                if($emailExist == 0) {
                    //On vérifie que le pseudo n'existe pas déjà dans la bdd
                    $pseudo = $conn->prepare("SELECT * FROM users WHERE username=?");
                    $pseudo->execute(array($username));
                    $verifPseudo = $pseudo->rowCount();
                    //var_dump($verifPseudo);die;
                    if($verifPseudo == 0) {
                        //si les mdp correspondent on fait la requete d'insertion
                        if($password == $confirmPassword) {
                            $query = $conn->prepare("INSERT into `users` (username, email, password, date_of_birth, created_at)
                            VALUES ('$username', '$email', '$password', '$birthday', '$dateCreate')");
                            $query->execute();
                            $_SESSION['message'] = "Votre compte a bien été créé ! Cliquez ici pour vous <a href=\"login.php\">connecter</a>";
                            echo $_SESSION['message'];
                        } else {
                            $_SESSION['message'] = "Vos mots de passe ne correspondent pas.";
                            header('Location:register.php');
                        }
                    } else {
                        $_SESSION['message'] = "Ce pseudo est déjà utilisé. Veuillez en choisir un autre";
                        header('Location:register.php');
                    }
                } else {
                    //Si l'email existe en bdd
                    $_SESSION['message'] = "Adresse mail déjà utilisée ! Cliquez ici pour vous <a href=\"login.php\">connecter</a>";
                    header('Location:register.php');
                }
            } else {
                $_SESSION['message'] = "Votre adresse mail n'est pas valide";
                header('Location:register.php');
            }
        } else {
            $_SESSION['message'] = "Merci de compléter tous les champs.";
            header('Location:register.php');
        }
    }




           
    //         //on prépare la requête
    //         $query = $conn->prepare("INSERT into `users` (username, email, password, date_of_birth, created_at)
    //         VALUES ('$username', '$email', '$password', '$birthday', '$dateCreate')");
    //         $query->execute();
    //         //$message = "Votre compte a bien été créé ! Cliquez ici pour vous <a href=\"login.php\">connecter</a>";
    //         echo "Votre compte a bien été créé ! Cliquez ici pour vous <a href=\"login.php\">connecter</a>";
    //     }
    // }
?>
<?php

        //     //On vérifie si les champs sont remplis
        //     if(!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['birthday'])) {
        //         //On vérifie si le mail existe déjà dans la bdd
        //         if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //             $emailBdd = $conn->prepare("SELECT email FROM users WHERE email = ?");
        //             $emailBdd->execute(array($email)); 
        //             $emailExist = $emailBdd->rowCount();
        //             var_dump($emailExist);die;
        //             //Si l'email n'existe pas dans la bdd
        //             if($emailExist == 0) {
        //                 //On vérifie que le pseudo n'existe pas déjà dans la bdd
        //                 $pseudo = $conn->prepare("SELECT * FROM users WHERE username=?");
        //                 $pseudo->execute([$username]);
        //                 $verifPseudo = $pseudo->fetch();
        //                 if($verifPseudo) {
        //                     $message = "Ce pseudo est déjà utilisé. Veuillez en choisir un autre";
        //                 }
        //                 //On vérifie que les mdp correspondent
        //                 if($password == $confirmPassword) {
        //                     $query = $conn->prepare("INSERT into `users` (username, email, password, date_of_birth, created_at)
        //                     VALUES ('$username', '$email', '$password', '$birthday', '$dateCreate')");
        //                     $query->execute();
        //                     $message = "Votre compte a bien été créé ! Cliquez ici pour vous <a href=\"login.php\">connecter</a>";
        //                     echo $message;
        //                 } else {
        //                     $message = "Vos mots de passe ne correspondent pas.";
        //                 }
        //             } else {
        //                 //Si l'email existe en bdd
        //                 $message = "Adresse mail déjà utilisée ! Cliquez ici pour vous <a href=\"login.php\">connecter</a>";
        //             }
        //         } else {
        //             $message = "Votre adresse mail n'est pas valide";
        //         }
        //     } else {
        //         $message =  "Merci de compléter tous les champs.";
        //     }
        // }


        // if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['birthday'])){
        //     // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        //     $username = stripslashes($_REQUEST['username']);
        //     $username = mysqli_real_escape_string($conn, $username); 
        //     // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        //     $email = stripslashes($_REQUEST['email']);
        //     $email = mysqli_real_escape_string($conn, $email);
        //     // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        //     $password = stripslashes($_REQUEST['password']);
        //     $password = mysqli_real_escape_string($conn, $password);
        //     // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        //     $birthday = stripslashes($_REQUEST['birthday']);
        //     $birthday = mysqli_real_escape_string($conn, $email);
        //     //On récupère la date actuelle
        //     $dateCreate = date('y-m-d');
        //     //On vérifie que les deux mdp soient identiques 
        //     $confirmPassword = $_REQUEST['confirmPassword'];
        //     if($password != $confirmPassword) {
        //         echo "Les mots de passe ne sont pas identiques.";
        //         header("Location: register.php");
        //         die();
        //     }
        //     //On vérifie si le pseudo est déjà utilisé par quelqu'un
        //     $pseudo = $conn->prepare("SELECT * FROM users WHERE username=?");
        //     $pseudo->execute([$username]);
        //     $verifPseudo = $pseudo->fetch();
        //     if($verifPseudo) {
        //         die('Ce pseudo est déjà utilisé. Veuillez en choisir un autre');
        //     }
        //     //On vérifie si l'email existe déjà dans la bdd
        //     $emailBdd = $conn->prepare("SELECT * FROM users WHERE email=?");
        //     $emailBdd->execute([$email]); 
        //     $user = $emailBdd->fetch();
        //     if ($user) {
        //         die('Cet email existe déjà. Pour vous connecter, cliquez  sur "Se connecter"');
        //     } else {
        //         //requête SQL + mot de passe crypté
        //           $query = "INSERT into `users` (username, email, password, date_of_birth, created_at)
        //                     VALUES ('$username', '$email', '".hash('sha256', $password)."', '$birthday', '$dateCreate')";
        //         // Exécuter la requête sur la base de données
        //           $res = mysqli_query($conn, $query);
        //           if($res){
        //              echo "<div class='sucess'>
        //                    <h3>Vous êtes inscrit avec succès.</h3>
        //                    <p>Cliquez ici pour vous <a href='security/login.php'>connecter</a></p>
        //              </div>";
        //           }
        //     } 
        //   }

?>