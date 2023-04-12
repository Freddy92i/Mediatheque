<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../style/style.css" />
</head>
<body>
  
<?php
include "../app/connexionpdo.php";
include '../config.php';
?>

<form class="box" action="<?= SITE_URL ?>/connexion/traitement/adduser-process.php" method="post">
  <h1 class="box-logo box-title"></h1>
  <h1 class="box-title">Ajouter des utilisateurs</h1>

  <input type="text" class="box-input" name="mail" placeholder="Email" required />
  <input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required />
  <input type="text" class="box-input" name="prenom" placeholder="prénom" required />
  <input type="text" class="box-input" name="nom" placeholder="nom" required />
  
  <input type="submit" class="submit-user" name="submit" value="Ajouter" class="box-button" />

</form>
<div class="retourmediatheque"  style="text-align: center; text-decoration: none" >
	  <a class="buttonback" href="<?= SITE_URL ?>/admin/home.php"> Retour </a>
</div>
</body>
</html>

