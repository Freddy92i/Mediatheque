<?php

session_start();
include('../APP/connexionPDO.php');
$req = $bdd->prepare('SELECT mail, mdp, id FROM information WHERE mail = :mail');
$req->execute(array('mail' => $_POST['mail']));
$result = $req->fetch();

if(empty($_POST['mail']) OR empty($_POST['mdp'])) { // Si un des 2 champs est vide
    // Création de la session message pour y afficher le message d'erreur
    $_SESSION['message']='Erreur de champ';
   // header('location: ../index.php');
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
      //  header('location: ../index.php');   
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
require_once "../APP/connexionPDO.php";

//definir variable et initialiser avec valeur nulle
$username = $mdp = "";
$username_err = $mdp_err = $login_err = "";

// analyser les données une fois envoyée
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validation du token
    if (!isset($_SESSION['token']) || !isset($_POST['token']) || ($_POST['token'] != $_SESSION['token'])) {
        header ("HTTP/1.1 418");
        echo "CSRF erreur de validation !";
        exit;
    }
    
    //check username vide
    if(empty(trim($_POST["mail"]))){
         $username_err = "entrez un nom d'utilisateur";
    } else{
        $username = trim($_POST["mail"]);
    }

    // Check  mdp vide
    if (empty(trim($_POST[ "mdp"]))){
        $_mdp_err ="entrez votre mot de passe";
    } else {
        $mdpUnashed = trim($_POST["mdp"]);
    }

    // credential valide
    if (empty ($username_err) && empty ($mdp_err)) {

        // Prepare statement
        $sql = "SELECT id, username, mdp, salt FROM users WHERE username = ?" ;
        $stmt = $bdd->prepare($sql);

        if ($stmt) {
            $stmt->bindParam($stmt, "s", $setting_username);

            //setting username
            $setting_username = $username;

            if($stmt->execute($stmt)) {

                $stmt->fetch($stmt);

                if($stmt->count($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_mdp, $salt);

                    if (mysqli_stmt_fetch($stmt)) {
                        $setting_mdp = hash("sha256",$mdpUnashed. hash("sha256",$salt));


                        if($setting_mdp == $hashed_mdp) {
                            // mdp correct
                            session_start();
                            // stocke dans la variable de session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            // redirect
                            header(location:"index.php");
                        } else {
                            $login_err = "nom d'utilisateur ou mot de passe invalide.";
                            print_r($username);
                            echo '<br>';
                            print_r($setting_mdp);
                            echo '<br>';
                            print_r($hashed_mdp);
                        }
                    } else {
                        $login_err = "Erreur de communication avec la base de données";
                    }
                }
            } else {
                $login_err = "nom d'utilisateur ou mot de passe invalide";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later";
        }

        // close stmt
        $stmt->closeCursor($stmt);
        //$this->connection = null;
    }
}
?>
