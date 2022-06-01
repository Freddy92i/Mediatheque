<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php include "navbar.php" ?>
<?php
require('../app/connexionpdo.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['role'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // récupérer le type (user | admin)
  $role = stripslashes($_REQUEST['role']);
  $role = mysqli_real_escape_string($conn, $role);
  
   $req = $bdd->prepare('INSERT INTO `information` (`id`,`mail`,`role`,`mdp`,`prenom`,`nom`) VALUES(:id,:mail,:_role,:mdp,:prenom,:nom)');
        $req->execute(array('id' => NULL, 'mail' => $mail, '_role' => $role, 'mdp' => $mdp, 'prenom' => $prenom, 'nom' => $nom));
        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Inscription effectue avec succes';

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='../index.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
?>
<form class="box" action="traitement/traitementinscription.php" method="post">
  <h1 class="box-logo box-title">
  </h1>
    <h1 class="box-title">Ajouter des utilisateurs</h1>
  <input type="text" class="box-input" name="prenom" 
  placeholder="Prénom" required />
  <input type="text" class="box-input" name="nom" 
  placeholder="Nom" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
  <div>
      <select class="box-input" name="role" id="role" >
        <option value="" disabled selected>role</option>
        <option value="admin">admin</option>
        <option value="user">guest</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value=" + Ajouter" class="box-button" />
</form>
<?php } ?>
<?php include "footer.php" ?>
</body>
</html>

