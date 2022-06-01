
<html>
  <head>
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <?php include "navbar.php" ?>
      <div class="sucess">
        <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
        <p>C'est votre espace admin.</p>
        <ul>
          <a href="add_user.php">ajouter un utilisateurs</a> | 
          <a href="#">Update user</a> | 
          <a href="#">Delete user</a> | 
          <a href="../traitement/traitementdeconnexion.php">Déconnexion</a>
        </ul>
      </div>
  </body>
</html>