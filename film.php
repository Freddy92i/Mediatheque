<html>
    <head>
         <link rel="stylesheet" href="css/effet.scss">
    </head>
<body>

<?php
include "app/connexionpdo.php";


$id = $_GET["id"];
$query = $bdd->prepare('SELECT film.id, film.nom, film.duree, film.realisateur, categorie.categorie, film.resume, film.img, film.img_alt AS categorie FROM film INNER JOIN categorie ON film.RefCat = categorie.RefCat WHERE film.id = :id ORDER BY categorie.categorie');
$query->execute(['id' => $id]);
$result = $query->fetch();
$tab = ['id', 'nom', 'duree', 'resume', 'realisateur', 'img', 'categorie', 'img_alt'];
$i = 1;
$nom = $result[1];
$duree = $result[2];
$realisateur = $result[3];
$categorie = $result[4];
$resume = $result[5];
$affiche = $result[6];
$affichealt = $result[7]





?>
<div class="movie-card">
  
  <div class="blocfilm">
    
  <a>
    <img  class='cover' src=" <?php echo $affiche ?>" >
  </a>
        
    <div class="hero">
      <img  class='heroalt' src=" <?php echo $affichealt ?>" >
            
      <div class="details">
      
        <div class="title1" style=" font-size: 30px; color: black;"><?php echo $nom ?></div>   

        <!--<div class="duree" style=" font-size: 30px; color: black;"><?php // echo $duree ?></div>   -->
        
        
      </div> <!-- end details -->
      
    </div> <!-- end hero -->
    
    <div class="description">
      
      <div class="column1">
        <span class="tag"><?php echo $categorie ?></span>

      </div> <!-- end column1 -->
      
      <div class="column2">
        
        <p><?php echo $resume ?></p>
        

        
        
        
      </div> <!-- end column2 -->
    </div> <!-- end description -->
      <div class="adminmove">
          <?php if($user && $user['role'] == 'admin') { ?>
            <a href="editmovie.php?filmid=<?php echo $film['id']; ?>" class="card-link">Modifier</a>
            <a href="traitement/deletemovie.php?filmid=<?php echo $film['id']; ?>" class="card-link">Supprimer</a>
      </div>
    </div>
    
   
  </div> <!-- end container -->
</div> <!-- end movie-card -->

</body>
</html>
<?php } ?>
