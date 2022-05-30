<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
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
  
    $query = "INSERT into `users` (username, email, role, password)
          VALUES ('$username', '$email', '$role', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='../index.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">
  </h1>
    <h1 class="box-title">Ajouter des utilisateurs</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Nom d'utilisateur" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
  <div>
      <select class="box-input" name="role" id="role" >
        <option value="" disabled selected>role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="+ Ajouter" class="box-button" />
</form>
<?php } ?>
</body>
</html>
<?php include "footer.php" ?>