<?php
include '../../config.php';


session_start();
if(isset($_COOKIE['id'])) {
    $_SESSION['message']='Vous êtes déjà connecté';
    header('location: ../../index.php');
} else {
    include "../../app/connexionpdo.php";
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $role = 'guest';
    $algo = PASSWORD_DEFAULT;






    if (empty($_POST['mail']) OR empty($_POST['password']) OR empty($_POST['prenom']) OR empty($_POST['nom']) OR empty($_POST['password2']) OR strlen($password) < 6) {  // Gestion d'erreur
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Erreur de champs';
    } elseif ($password != $password2) { // Gestion d'erreur pour que les 2 mots de passes correspondent
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Les 2 password ne sont pas identiques';
        header('location: ../login.php');
    } else { // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table User
        $password = password_hash($password, $algo);
        $req = $bdd->prepare('INSERT INTO `User` (`mail`,`role`,`password`,`prenom`,`nom`) VALUES(:mail,:_role,:password,:prenom,:nom)');
        $req->execute(array('mail' => $mail, '_role' => $role, 'password' => $password, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Inscription effectue avec succes';
        header('location:../login.php');
    }
}
?>
