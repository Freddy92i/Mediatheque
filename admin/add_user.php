<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<?php
require('../app/connexionpdo.php');

?>
<form class="form-signup" method="post" action="traitement/traitementinscription.php">

<div class="sign-up-htm">
  <div class="perso-inputs">
    <div class="group" id="name">
      <label for="user" class="label">prenom</label>
      <input id="prenom" type="text" name="prenom"  placeholder="Entrer votre nom" class="input">
    </div>
    <div class="group" id="name">
      <label for="user" class="label">nom</label>
                <input  id="nom" type="text" name="nom" class="input" placeholder="Entrer votre nom" required autofocus>
            </div>
  </div>
  <div class="group">
    <label for="email" class="label">Email </label>
    <input id="email" type="email" name="mail" placeholder="Entrer votre mail" class="input">
  </div>
  <div class="group">
    <label for="mdp" class="label">mot de passe</label>
    <input id="pass" type="password" name="mdp" placeholder="Entrer votre mot de passe" class="input" data-type="password">
  </div>
  <div class="group">
    <label for="mdp2" class="label">Répéter le mot de passe</label>
    <input id="pass2" type="password" name="mdp2" placeholder="répétez le mot de passe" class="input" data-type="password">
  </div>
</div>
  </form>
  
    <input type="submit" name="submit" value="+ Add" class="group" />
</form>
</body>
</html>
<?php include "footer.php" ?>