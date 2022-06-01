<?php
require('../app/connexionpdo.php');
   if($user && $user['role'] == 'admin') { ?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="../style.css" />

  </head>
  <body>
  <?php include "navbar.php" ?>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre espace admin.</p>
    <a href="add_user.php">ajouter un utilisateurs</a> | 
    <a href="#">Update user</a> | 
    <a href="#">Delete user</a> | 
    <a href="../traitement/traitementdeconnexion.php">Déconnexion</a>
    </ul>
    </div>
  </body>
</html>

<? } 
else{

  ?>
  <html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Echec </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="../css/style.css" rel="stylesheet">
    <script src="main.js"></script>
<meta http-equiv="refresh" content="4;url=../index.php">
  </head>
  <body>
  <?php include "navbar.php" ?>
  <div class="cnxreussie">
        Vous n'êtes pas admin, nous allons vous rediriger.
        </div>
    <div class="loader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </body>
</html>
<?php
}
?>