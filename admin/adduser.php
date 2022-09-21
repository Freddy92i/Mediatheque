<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  
<?php require('../app/connexionpdo.php');

?>
<form class="box" action="../traitement/adduser-process.php" method="post">
  <h1 class="box-logo box-title"></h1>
  <h1 class="box-title">Ajouter des utilisateurs</h1>

  <input type="text" class="box-input" name="mail" placeholder="Email" required />
  <input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required />
  <input type="text" class="box-input" name="prenom" placeholder="prénom" required />
  <input type="text" class="box-input" name="nom" placeholder="nom" required />
  
  <input type="submit" class="submit-user" name="submit" value="Ajouter" class="box-button" />

</form>
<div class="retourmediatheque"  style="text-align: center; text-decoration: none" >
	  <a href="./home.php"> Retour </a>
</div>
</body>
</html>

