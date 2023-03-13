<?php
    include "../app/connexionpdo.php";
    include 'config.php';

    session_start();

    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $role = 'guest';
    $algo = PASSWORD_DEFAULT;


    if (empty($mail) || empty($password) || empty($prenom) || empty($nom)) { // Gestion d'erreur si un des champs est vide
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Un des champs est vide';
    } elseif (strlen($mail) < 3 || strlen($password) > 500 || strlen($prenom) > 40 || strlen($nom) > 500 ) {
        $_SESSION['message'] = 'Problème d\'insertion dans la base de donnée';
    } 
    else { // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table User
        $password = password_hash($password, $algo);
        $req = $bdd->prepare('INSERT INTO `User` (`mail`,`role`,`password`,`prenom`,`nom`) VALUES(:mail,:_role,:password,:prenom,:nom)');
        $req->execute(array('mail' => $mail, '_role' => $role, 'password' => $password, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        ?>
        <script>
            alert("Inscription effectue avec succes");
        </script>
        
        <?php
        // $_SESSION['alert'] = 'Inscription effectue avec succes';
        
        header('location:../admin/home.php');

    }
?>