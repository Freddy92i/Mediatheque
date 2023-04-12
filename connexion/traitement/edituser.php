<?php
    include "../../interface/navbar.php";
    include "../../app/connexionpdo.php";
    include "../../config.php";

    session_start();

    $message = isset($_SESSION['message']) ? $_SESSION['message'] : null;

    $id = $_GET["id"];
    $user_query = $bdd->prepare('SELECT user.id, user.role, user.mail, user.prenom, user.nom FROM user WHERE id = :id');
    $user_query->execute(['id' => $id]);
    $user_result = $user_query->fetch();
    $user_data = [
        'id' => $user_result['id'],
        'role' => $user_result['role'],
        'mail' => $user_result['mail'],
        'prenom' => $user_result['prenom'],
        'nom' => $user_result['nom']
    ];
?>

<html>
    <head>
        <link rel="stylesheet" href="../../style/style.css">
        <link rel="stylesheet" href="../../style/movie.css">
    </head>
    <body class="body-film">
        <form method="post" action="updateuser-process.php" style="text-align: center">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" value="<?php echo htmlspecialchars($user_data['id']); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rôle</label>
                            <input type="text" name="role" class="form-control" value="<?php echo htmlspecialchars($user_data['role']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="mail" class="form-control" value="<?php echo htmlspecialchars($user_data['mail']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars($user_data['prenom']); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nom</label>
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