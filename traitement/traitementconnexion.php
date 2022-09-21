<?php

session_start();
include('../app/connexionpdo.php');
$req = $bdd->prepare('SELECT mail, mdp, id FROM information WHERE mail = :mail');
$req->execute(array('mail' => $_POST['mail']));
$result = $req->fetch();

if(empty($_POST['mail']) OR empty($_POST['mdp'])) { // Si un des 2 champs est vide
    // Création de la session message pour y afficher le message d'erreur
    $_SESSION['message']='Erreur de champ';
    header('location: ../log.php');
} elseif ($req->rowCount() == 1) { // Si le formulaire correspond à une ligne de la base de données information
    $mdp = $_POST['mdp'];
    $hash = $result['mdp'];
    if(password_verify($mdp, $hash)) {
        setcookie('id', $result['id'], time() + 3600, '/');
        //$_SESSION['message']='Connexion réussie';
        header('location: cnxsucces.php');
    } else {
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message']='Erreur de connexion';
        header('location: ../log.php');
    }
} else {
    // Création de la session message pour y afficher le message d'erreur
    $_SESSION['message']='Erreur de connexion';
    //header('location: ../index.php');
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// verifie sur le user est logué, si oui redirect index
if (isset($_SESSION["loggedin"]) && $_SESSION[ "loggedin"] === true) {
    header ("location: index.php");
    exit;
}
// include config file
require_once "../app/connexionpdo.php";

//definir variable et initialiser avec valeur nulle
$mail = $mdp = "";
$mail_err = $mdp_err = $login_err = "";

// analyser les données une fois envoyée
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validation du token
    if (!isset($_SESSION['token']) || !isset($_POST['token']) || ($_POST['token'] != $_SESSION['token'])) {
        header ("HTTP/1.1 418");
        echo "CSRF erreur de validation !";
        exit;
    }
    
    //check mail vide
    if(empty(trim($_POST["mail"]))){
         $mail_err = "entrez un nom d'utilisateur";
    } else{
        $mail = trim($_POST["mail"]);
    }

    // Check  mdp vide
    if (empty(trim($_POST[ "mdp"]))){
        $_mdp_err ="entrez votre mot de passe";
    } else {
        $mdpUnashed = trim($_POST["mdp"]);
    }

    // credential valide
    if (empty ($mail_err) && empty ($mdp_err)) {

        // Prepare statement
        $sql = "SELECT id, mail, mdp FROM information WHERE mail = :mail" ;
        $stmt = $bdd->prepare($sql);

        if ($stmt) {
            if($stmt->execute([ 'mail' => $mail ])) {

                $stmt->fetch();

                if($stmt->rowCount() > 0) {

                   // mysqli_stmt_bind_result($stmt, $id, $mail, $hashed_mdp, $salt);
                    $stmt->bindColumn($stmt, $id, $mail, $hashed_mdp, $salt);
                    if ($stmt->fetch()) {
                        if(password_verify($mdpUnashed, $hashed_mdp)) {
                            // mdp correct
                            session_start();
                            // stocke dans la variable de session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["mail"] = $mail;
                            // redirect
                            header("Location: index.php");
                        } else {
                            $login_err = "nom d'utilisateur ou mot de passe invalide.";
                            print_r($mail);
                        }
                    } else {
                        $login_err = "Erreur de communication avec la base de données";
                    }
                }
            } else {
                $login_err = "nom d'utilisateur ou mot de passe invalide";
            }
        } else {
            echo "Oops! Quelque choses s'est mal passé ! veuillez rééssayer";
        }

        // close stmt
        $stmt->closeCursor($stmt);
        $this->connection = null;
    }
}
?>
