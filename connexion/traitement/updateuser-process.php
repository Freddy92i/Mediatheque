<?php
    include '../../config.php';
    include "../../app/connexionpdo.php";
    session_start();

    $id = $_POST['id'];
    $mail = $_POST['mail'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $role = $_POST['role'];
    $algo = PASSWORD_DEFAULT;


    if (empty($id) ||empty($mail) ||empty($prenom) || empty($nom) || empty($role)) { // Gestion d'erreur si un des champs est vide
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Un des champs est vide';
        header("Location: ../admin/edituser.php?id=$id");

    } elseif (strlen($role) != 5 ||  strlen($mail) < 3 /* || strlen($mdp) > 500 */ || strlen($prenom) > 40 || strlen($nom) > 500)  {
        $_SESSION['message'] = 'Problème d\'insertion dans la base de donnée';
        header("Location: ../admin/edituser.php?id=$id");

    } else { 
        // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table information
        //$mdp = password_hash($mdp, $algo);
        $req = $bdd->prepare("UPDATE User SET id = :id, `role` = :_role, mail = :mail, prenom = :prenom, nom = :nom WHERE id = :id");
        $req->execute(array('id' => $id, '_role' => $role, 'mail' => $mail, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Modification effectué avec succes';
        header("Location: ../admin/home.php");


    }

?>