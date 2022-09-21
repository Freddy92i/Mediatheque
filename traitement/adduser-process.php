<?php
    include "../app/connexionpdo.php";
    session_start();

    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $role = 'guest';
    $algo = PASSWORD_DEFAULT;


    if (empty($mail) || empty($mdp) || empty($prenom) || empty($nom)) { // Gestion d'erreur si un des champs est vide
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Un des champs est vide';
    } elseif (strlen($mail) < 3 || strlen($mdp) > 500 || strlen($prenom) > 40 || strlen($nom) > 500 ) {
        $_SESSION['message'] = 'Problème d\'insertion dans la base de donnée';
    } 
    else { // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table information
        $mdp = password_hash($mdp, $algo);
        $req = $bdd->prepare('INSERT INTO `information` (`mail`,`role`,`mdp`,`prenom`,`nom`) VALUES(:mail,:_role,:mdp,:prenom,:nom)');
        $req->execute(array('mail' => $mail, '_role' => $role, 'mdp' => $mdp, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        // echo '<script>alert("Inscription effectue avec succes")</script>';
        $_SESSION['alert'] = 'Inscription effectue avec succes';
        
        header('location:../admin/home.php');

    }
?>