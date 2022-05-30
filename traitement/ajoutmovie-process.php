<?php
if(empty($_COOKIE['id'])) {
    $_SESSION['message']='Veuillez vous inscrire ou vous connecter pour accéder à cette rubrique';
    header('location: ../log.php');
} else {

    include "../app/Connexionpdo.php";
    session_start();

    $nom = $_POST['nom'];
    $duree = $_POST['duree'];
    $resume = $_POST['resume'];
    $realisateur = $_POST['realisateur'];
    $categorie = $_POST['categorie'];
    $image = $_POST['image'];
    $imagealt = $_POST['imagealt'];


    if (empty($_POST['nom']) OR empty($_POST['duree']) OR empty($_POST['resume']) OR empty($_POST['realisateur']) OR empty($_POST['categorie']) OR empty($_POST['image']) OR empty($_POST['imagealt'])) {  // Gestion d'erreur
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Erreur de champs';
        header('location: ../mediatheque.php');
    } else { // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table information
        $req = $bdd->prepare('INSERT INTO `film` (`id`,`nom`,`duree`,`resume`,`realisateur`,`categorie`,`image`,`imagealt`) VALUES(:id,:nom,:duree,:resume,:realisateur,:categorie,:image,:imagealt)');
        $req->execute(array('id' => NULL, 'mail' => $nom, 'duree' => $duree, 'resume' => $resume, 'realisateur' => $realisateur, 'categorie' => $categorie, 'image' => $image, 'imagealt' => $imagealt,));
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Inscription effectue avec succes';
        header('location:../log.php');


    }
}
?>