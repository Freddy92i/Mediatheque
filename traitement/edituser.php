<html>
    <head>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/movie.css">
      <link rel="stylesheet" href="../css/footer.css">

    </head>
<body class="body-film">
<?php include "../navbar.php" ?>

<?php
include "../app/connexionpdo.php";

session_start();

$message = isset($_SESSION['message']) ? $_SESSION['message'] : null;

$id = $_GET["id"];
$query = $bdd->prepare('SELECT information.id, information.role, information.mail, information.prenom, information.nom FROM information WHERE id = :id');
$query->execute(['id' => $id]);
$result = $query->fetch();
$tab = ['id', 'role', 'mail', 'prenom', 'nom'];
$i = 1;
$role = $result[1];
$mail = $result[2];
$prenom = $result[3];
$nom = $result[4];


?>
<html>
    <header>
    <link rel="stylesheet" href="../css/style.css" />
    </header>

    <body>
    <form method="post" action="../traitement/updateuser-process.php" style="text-align: center">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-6">
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id" class="form-control" value="<?php echo $result['id'];?>">
        </div>
            </div>
            <div class="col-md-6">
        <div class="form-group">
            <label>role</label>
            <input type="text" name="role" class="form-control" value="<?php echo $result['role'];?>">
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>mail</label>
                    <input type="text" name="mail" class="form-control" value="<?php echo $result['mail'];?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>prenom</label>
                    <input type="text" name="prenom" class="form-control" value="<?php echo $result['prenom'];?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>nom</label>
                    <input type="text" name="nom" class="form-control" value="<?php echo $result['nom'];?>">
                </div>
            </div>
        </div>
        


        <button type="submit" class="btn btn-primary" onclick="modifuser()">Modifier</button>
    </form>
    <script>
        function modifuser() {
        alert("la modification du user a été prise en compte !");
        }
</script>
        <div class="retourmediatheque"  style="text-align: center; text-decoration: none" >
	      <a href="../admin/home.php"> Retour </a>
        </div>

    </body>
</html>