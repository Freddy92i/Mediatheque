<?php 
include '../config.php';
include "../interface/navbar.php";

?>
<!DOCTYPE html>
<head >
	<link rel="stylesheet" href="<?= SITE_URL ?>/style/style.css">
	<link rel="stylesheet" href="<?= SITE_URL ?>/style/log.css">
</head>
<body class="body-log" style="margin: auto">


<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    //Génération du token

    $strong = true;
    $bytes = openssl_random_pseudo_bytes(16,$strong);
    $token = bin2hex($bytes);

    //on stocke le token dans la session
    $_SESSION['token'] = $token;
}

if(isset($_COOKIE['id'])) {
    $_SESSION['message']='Vous êtes déjà connecté';
    header('location: ../index.php');
} else {
if(isset($_SESSION['message'])) {
    ?>
    <div class="row">
        <div class="alertmsg" role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
    </div>
    <?php
    unset($_SESSION['message']);
    echo '<br>';
}
?>


<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Se Connecter</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'inscrire</label>
		<div class="login-form">
        <form class="form-signin" method="post" action="<?= SITE_URL ?>/connexion/traitement/traitementconnexion.php">
			<input type="hidden" name="token" value="<?php echo $token; ?>">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">e-mail</label>
					<input name="mail" type="text" class="input">
				</div>
				<div class="group">
					<label for="password" class="label">mot de passe</label>
					<input name="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Rester connecté ?</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Se Connecter">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk-si">
					<a class="forgot" href="#forgot">Vous avez oublié votre mot de passe ?</a>
				</div>
                <div class="homelink-signin">
					<a class="backhome" href="../index.php"> Retour a l'accueil </a>
				</div>
			</div>
        </form>

        <form class="form-signup" method="post" action="<?= SITE_URL ?>/connexion/traitement/traitementinscription.php">

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
					<label for="password" class="label">mot de passe</label>
					<input id="password" type="password" name="password" placeholder="Entrer votre mot de passe" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="password2" class="label">Répéter le mot de passe</label>
					<input id="password2" type="password" name="password2" placeholder="répétez le mot de passe" class="input" data-type="password">
				</div>
				
				<div class="group">
					<button class="button" type="submit">Inscrivez-vous</button>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk-su">
					<label class="dmembre" for="tab-1">Déjà membre ?</a>
				</div>
                <div class="homelink-signup">
					<a id="backhome"href="../index.php" > Retour a l'Accueil </a>
				</div>
			</div>
        </form>
	</div>
</div>
</body>

</body>
</html>
<?php } ?>
</div>

<?php include "../interface/footer.php" ?>
