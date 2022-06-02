<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php include "navbar.php" ?>
<?php
include "app/connexionpdo.php";


$list_user = $_GET["list_user"];
$query = $bdd->prepare('SELECT information.id, information.role, information.mail, information.mdp, information.prenom, information.nom');
$query->execute(['list_user' => $list_user]);
$result = $query->fetch();
$tab = ['id', 'role', 'mail', 'mdp', 'prenom', 'nom'];
$i = 1;

$id = $result[1];
$role = $result[2];
$mail = $result[3];
$mdp = $result[4];
$prenom = $result[5];
$nom = $result[6];

?>
<form class="box" action="../traitement/updateuser-process.php" method="post">
  <h1 class="box-logo box-title"> </h1>
    <h1 class="box-title">Modifier des utilisateurs</h1>
    <input type="text" class="box-input" name="prenom" placeholder="Prénom" required />
    <input type="text" class="box-input" name="nom" placeholder="Nom" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
  
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
<?php include "footer.php" ?>
</body>
</html>

