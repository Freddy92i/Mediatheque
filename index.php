<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css">
    
</head>
<html lang="fr">
    <body  style="margin:auto">



<?php include "navbar.php" ?>

<div class="accesmediatheque">
    <a id="medialink" class="medialink" href="mediatheque.php">Accéder à la Mediathèque <span class="sr-only"></span></a>
</div>
<?php
session_start();

if(isset($_SESSION['message'])) {
    ?>
    <div class="row">
        <div class="alert alert-primary offset-4 col-md-4 " role="alert">
        <?php echo $_SESSION['message']; ?>
    </div>
    </div>
    <?php
    unset($_SESSION['message']);
    echo '<br>';
}
?>
    <main role="main">

<!-- START THE FEATURES -->

            <hr class="divider">

            <div class="blocpresentation" style="height: 400px">
                <h2 class="heading" style="text-align: center;padding-top: 20px;">PRESENTATION</h2>
                <div class="colgauche" >
                    <p class="lead">Bienvenue sur le site de la médiathèque. Le catalogue en ligne de la médiathèque vous permet d'effectuer des recherches pour connaître les derniers livres, CD ou DVD disponibles, mais aussi de consulter votre compte personnel, de suivre l'état de vos réservations, ou de vérifier la liste de vos documents empruntés.</p>
                </div>
                <div class="coldroite" style="width:50%; float:right;">
                    <img class="imgmediatheque" width="400px" height="200px" src="img\bibliothequeext.png">
                </div>
            </div>


            <hr class="divider">

            <div class="blochorraires">
            <h2 class="heading" style="text-align: center;padding-top: 20px;">HORAIRES</span></h2>

                <div class="coldroite">
                    <p>Nouveaux horaires à la médiathèque</p>
                    <p>Mardi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 9h-18h</p>
                    <p>Mercredi 9h-18h</p>
                    <p>Vendredi 9h-19h</p>
                    <p>Samedi&nbsp;&nbsp; 9h-18h</p>
                </div>
                <div class="colgauche">
                    <img  src="img\horaires.jpg">
                </div>
            </div>

            <hr class="divider">

            <div class="blocinfos">
                <h2 class="heading" style="text-align: center;padding-top: 20px;" >INFOS PRATIQUES</span></h2>
                <div class="colgauche">
                    <p>Nom : Médiathèque <br><br>Adresse : 8 rue de l’Hôtel de Ville 14000 Caen.<br><br>Téléphone : 02.31.66.66.66<br><br>E-mail général : <a href="mailto:mediatheque@localhost" style="color:black">mediatheque@localhost</a></p>                </div>
                <div class="coldroite">
                    <img class="imgint" src="img\mediatheque.jpg">
                </div>
            </div>

            <hr class="divider">
    </main>
</body>
<?php include "footer.php" ?>


</div>
</html>