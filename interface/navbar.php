<!DOCTYPE html>

<header class="navbar" style="background: black; padding: 0.5rem;display: flex;align-items: center;justify-content: space-between;">
  <div class="logo" style="max-height: 35px">
    <a href="<?= SITE_URL ?>/index.php">
      <img src="<?= SITE_URL ?>/assets/logo.png" alt="Logo Médiathèque Numérique" style="height:35px">
    </a>
  </div>
  <div class="nav-menus">
    <ul class="navbar-ul" style="margin-bottom: 0;font-size: larger;">
      <li><a href="<?= SITE_URL ?>/pages/newfilms.php">Nouveautés</a></li>
      <li><a href="<?= SITE_URL ?>/pages/topfilms.php">Top</a></li>
      <li><a href="<?= SITE_URL ?>/pages/selection.php">Sélections</a></li>
      <li><a href="<?= SITE_URL ?>/pages/discover.php">Découvrir</a></li>
    </ul>
</div>

  <div class="connexion" >
  

  
    <?php 
    
      if(empty($_COOKIE['id'])) { 
                 $user = null;
                 echo '<ul style="margin: 0"><li><a href="../connexion/login.php">SE CONNECTER</a></li></ul></div>';
                 } elseif(isset($_COOKIE['id'])) { // le cookie existe d'une ancienne connexion, le logout doit détruire le cookie
                include("app/connexionpdo.php");
                $id = $_COOKIE['id']; //
                $req = $bdd->prepare('SELECT * FROM User WHERE id= :id');
                $req-> execute(array('id'=>$id));
                $user = $req->fetch(); // ici si user pas trouvé tu dis quand meme bonjour user 
                if($user) {
                  // les echo vont ici 
                }
                echo '<div> <span style="color: red;">Bonjour '.$user['prenom'].' ! </span>'; // étrangement t'es pas co donc $user = null ou false donc pas possible d'accèder au champ prénom ;-)
                echo '<ul style="margin: 0"><li><a href="'. SITE_URL .'/connexion/traitement/traitementdeconnexion.php">SE DECONNECTER</a></li></ul></div>';


             }
    ?>
  </div>
</header>
