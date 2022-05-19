<?php
session_start();
if(isset($_COOKIE['id'])) {
    $_SESSION['message']='Vous êtes déjà connecté';
    header('location: ../index.php');
} else {
    include "../app/connexionpdo.php";
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $algo = PASSWORD_DEFAULT;






    if (empty($_POST['mail']) OR empty($_POST['mdp']) OR empty($_POST['prenom']) OR empty($_POST['nom']) OR empty($_POST['mdp2']) OR strlen($mdp) < 6) {  // Gestion d'erreur
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Erreur de champs';
        header('location: ../index.php');
    } elseif ($mdp != $mdp2) { // Gestion d'erreur pour que les 2 mots de passes correspondent
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Les 2 mdp ne sont pas identiques';
        header('location: ../log.php');
    } else { // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table information
        $role = 'guest';
        $mdp = password_hash($mdp, $algo);
        $req = $bdd->prepare('INSERT INTO `information` (`id`,`mail`,`role`,`mdp`,`prenom`,`nom`) VALUES(:id,:mail,:_role,:mdp,:prenom,:nom)');
        $req->execute(array('id' => NULL, 'mail' => $mail, '_role' => $role, 'mdp' => $mdp, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Inscription effectue avec succes';
        header('location:../log.php');
    }
}
?>
