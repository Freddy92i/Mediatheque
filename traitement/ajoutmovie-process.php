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

    if (empty($nom) || empty($duree) || empty($resume) || empty($realisateur) || empty($categorie) || empty($image )|| empty($imagealt)) { // Gestion d'erreur si un des champs est vide
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Un des champs est vide';
        header('location: ../ajoutmovie.php');
    } elseif(strlen($nom) > 40 || strlen($duree) > 3 || strlen($resume) > 500 || strlen($realisateur) > 40 || strlen($image) > 500 || strlen($imagealt) > 500) {
        $_SESSION['message'] = 'Problème d\'insertion dans la base de donnée';
        header('location: ../ajoutmovie.php');
    }
    else { // Si tous les champs sont remplis, on execute la requete SQL
        $req = $bdd->prepare('INSERT INTO film VALUES(:id,:nom,:duree,:resume,:realisateur,:categorie,:image,:imagealt)');
        $req->execute(array(
                'id' => NULL,
                'nom' => $nom,
                'duree' => $duree,
                'resume' => $resume,
                'realisateur' => $realisateur,
                'categorie' => $categorie,
                'image' => $image,
                'imagealt' => $imagealt,)
        );
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Ajout du film effectué avec succès';
        header('location: ../mediateque.php');
    }
}
?>