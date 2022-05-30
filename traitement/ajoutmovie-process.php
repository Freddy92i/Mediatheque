<?php
if(empty($_COOKIE['id'])) {
    $_SESSION['message']='Veuillez vous inscrire ou vous connecter pour accéder à cette rubrique';
    header('location: ../log.php');
} else {
    include "../app/connexionpdo.php";
    session_start();
    $id = $_SESSION['filmid'];
    $nom = $_POST['nom'];
    $duree = $_POST['duree'];
    $resume = $_POST['resume'];
    $realisateur = $_POST['realisateur'];
    $categorie = $_POST['categorie'];
    $image = $_POST['image'];

    if (empty($nom) || empty($duree) || empty($resume) || empty($realisateur) || empty($categorie) || empty($image)) {
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Un des champs est vide';
        header('location: ../ajoutmovie.php');
    } else {
        $req = $bdd->prepare('INSERT INTO film VALUES(:id,:nom,:duree,:resume,:realisateur,:categorie,:image)');
        $req->execute(array(
            'id' => NULL,
            'nom' => $nom,
            'duree' => $duree,
            'resume' => $resume,
            'realisateur' => $realisateur,
            'categorie' => $categorie,
            'image' => $image,)
    );

        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Ajout du film effectué avec succès';
        header('location: ../mediatheque.php');

    }
}
?>