<?php
    include "../app/connexionpdo.php";
    session_start();

    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];

    if (empty($id) || empty($mail) || empty($mdp) || empty($prenom) || empty($nom)) { // Gestion d'erreur si un des champs est vide
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Un des champs est vide';
        header('location: ../admin/adduser.php');
    } elseif(strlen($id) > 40 || strlen($mail) > 3 || strlen($mdp) > 500 || strlen($prenom) > 40 || strlen($nom) > 500 ) {
        $_SESSION['message'] = 'Problème d\'insertion dans la base de donnée';
        header('location: ../admin/adduser.php');
    }
    else { // Si tous les champs sont remplis, on execute la requete SQL
        $req = $bdd->prepare('INSERT INTO information VALUES(:id,:mail,:mdp,:prenom,:nom)');
        $req->execute(array(
                'id' => NULL,
                'mail' => $mail,
                'mdp' => $mdp,
                'prenom' => $prenom,
                'nom' => $nom,)
        );
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Ajout du user effectué avec succès';
        header('location: ../admin/home.php');
    }
?>