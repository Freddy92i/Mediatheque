<head>
<link rel="stylesheet" href="/css/style.css">
<!-- <link href="/media/examples/link-element-example.css" rel="stylesheet">-->
</head>
<body>
    <nav style="background-color:#1A1919" >
        <div id="navbar" class="collapse navbar-collapse" id="navbarSupportedContent">
           <a href="index.php"><img width="150px" height="50px" src="img\logo.png"></a>
            <div id="logo-droite">
                <ul class="navbar-ul">
                    <a id="log-btn" href="log.php" ><img id="log-img" title="Se Connecter ou s'inscrire" src="img\id.png">
                    </a>
                 </ul>
            </div>
            <?php if(empty($_COOKIE['id'])) { 
                 $user = null;
                 } elseif(isset($_COOKIE['id'])) {
                include("APP/connexionPDO.php");
                $id = $_COOKIE['id'];
                $req = $bdd->prepare('SELECT * FROM information WHERE id= :id');
                $req-> execute(array('id'=>$id));
                $user = $req->fetch();
                echo '<div id="navbar-hello"><span>Bonjour '.$user['prenom'].' !&nbsp;&nbsp;</span>';
                echo '<a class="logout-img" href="Traitement/traitementDeconnexion.php"> <img id="logout-image" title="se déconnecter" src="img\logout.png"> </a></div>';
             } ?>
         </div>
    </nav>
<body> 