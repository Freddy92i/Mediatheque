<?
    session_start();

    include "../app/connexionpdo.php";
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $prenom = $_POST['prenom'];
    $role = $_POST['role'];
    $nom = $_POST['nom'];
    $algo = PASSWORD_DEFAULT;






    if (empty($_POST['mail']) OR empty($_POST['mdp']) OR empty($_POST['prenom']) OR empty($_POST['nom']) OR strlen($mdp) < 6) {  // Gestion d'erreur
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Erreur de champs';
        header('location: ../admin/add_user.php');
    } else { // S'il n'y a pas d'erreur, on execute la requête SQL pour insérer les données dans la table information
        $role = 'guest';
        $mdp = password_hash($mdp, $algo);
        $req = $bdd->prepare('INSERT INTO `information` (`id`,`mail`,`role`,`mdp`,`prenom`,`nom`) VALUES(:id,:mail,:_role,:mdp,:prenom,:nom)');
        $req->execute(array('id' => NULL, 'mail' => $mail, '_role' => $role, 'mdp' => $mdp, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Inscription effectue avec succes';
        header('location:../admin/add_user.php');
    }
?>