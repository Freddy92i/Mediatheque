<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="footer-dark">
        <footer style="background: black;">
            <div class="container" style="padding-top: 2rem">
                <div class="row" style="display: flex; flex-wrap: wrap; margin-left: -15px; justify-content: center; gap: 7rem;">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul style=" display: flex; flex-direction: column; ">
                            <li><a class="textfooter" href="#">Films</a></li>
                            <li><a class="textfooter" href="#">Séries TV</a></li>
                            <li><a class="textfooter" href="#">Acteurs</a></li>
                        </ul>
                    </div>
                    
                    <div class="logo-footer">
                        <a href="index.php"> </a>
                        <img src="<?= SITE_URL ?>/assets/logo.png" alt="Logo Médiathèque Numérique" style=" height: 5rem; ">
                    </div>

                    <div class="col-sm-6 col-md-3 item" >
                        <h3 style="color: #E0E0E0">A-Propos</h3>
                        <ul  style="display: flex;flex-direction: column;align-items: center;">
                            <li><a class="textfooter" href="#">Horraires</a></li>
                            <li><a class="textfooter" href="#">Plan du site</a></li>
                            <li>
                            <?php if(empty($_COOKIE['id'])) { 
                 $user = null;
                 echo '<a class="textfooter" href="#">Informations </a></div>';
                 } elseif(isset($_COOKIE['id'])) {
                include("app/connexionpdo.php");
                $id = $_COOKIE['id'];
                $req = $bdd->prepare('SELECT * FROM User WHERE id= :id');
                $req-> execute(array('id'=>$id));
                $user = $req->fetch();
                echo '<ul> <li><a class="textfooter" href="' . SITE_URL . '/admin/home.php">Interface Admin</a></li></ul></div>';
                } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="connexion">
    
   
  </div>
                </div>
                <p class="copyright" style=" margin-bottom: 0px; ">Médiatheque Numerique © 2023</p>
            </div>
        </footer>
    </div>
</body>

</html>