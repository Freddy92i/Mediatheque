
<html>
  <head>
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <?php include "navbar.php" ?>
      <div class="sucess">
        <h1 class="admin-h1">Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
        <p class="admin-text" >C'est votre espace admin.</p>
        <ul class="admin-list" >
          <a class="admin-fonctions" href="adduser.php">ajouter un utilisateurs</a>&nbsp;&nbsp; | &nbsp;&nbsp;
          <a class="admin-fonctions" href="updateuser.php">Modifier un utilisateur</a>&nbsp;&nbsp; | &nbsp;&nbsp;
          <a class="admin-fonctions" href="deleteuser.php">supprimer un utilisateur</a>&nbsp;&nbsp; | &nbsp;&nbsp; &nbsp;&nbsp;
          <a class="admin-fonctions" href="../traitement/traitementdeconnexion.php">Déconnexion</a>
        </ul>
      </div>
  </body>
</html>