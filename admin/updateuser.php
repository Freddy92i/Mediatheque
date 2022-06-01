<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php include "navbar.php" ?>
<?php
include('app/connexionpdo.php');
if(!empty($_GET['id']))
{
    $id = $_GET['informationid'];
    $_SESSION['informationid'] = $id;
    $statement = $bdd->prepare("SELECT information.id, information.nom, information.duree, information.resume, information.realisateur, information.img, information.img_alt, categorie.categorie AS categorie FROM information INNER JOIN categorie ON information.RefCat = categorie.RefCat WHERE information.id = '$id'");
    $statement->execute();
    $result = $statement->fetch(2); ?>

<form class="box" action="../traitement/updateuser-process.php" method="post">
  <h1 class="box-logo box-title">
  </h1>
    <h1 class="box-title">Modifier des utilisateurs</h1>
  <input type="text" class="box-input" name="prenom" 
  placeholder="Prénom" value="<?php echo $result['prenom'];?>" required />
  <input type="text" class="box-input" name="nom" 
  placeholder="Nom" value="<?php echo $result['nom'];?>" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" value="<?php echo $result['mail'];?>" required />
  
  <div>
      <select class="box-input" name="role" id="role" >
        <option value="" disabled selected>role</option>
        <option value="admin">admin</option>
        <option value="user">guest</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" value="<?php echo $result['mdp'];?>"required />
  
    <input type="submit" name="submit" value=" + Ajouter" class="box-button" />
</form>
<?php include "footer.php" ?>
</body>
</html>
<?php
}
?>