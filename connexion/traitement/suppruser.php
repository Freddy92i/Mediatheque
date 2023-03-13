<head>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<?php

    session_start();
    include('../app/connexionpdo.php');
    include 'config.php';

    if (!empty($_GET['id'])) // On récupère l'id du film et on le supprime
    {
        $id = $_GET['id'];

        if(!empty($_GET['confirm'])) {
            if($_GET['confirm'] == 'Oui') {
                $statement = $bdd->prepare("DELETE FROM User WHERE id = ?");
                $statement->execute(array($id));
                // Création de la session message pour y afficher le message de confirmation
                $_SESSION['message'] = 'Suppression effectué avec succès';
                header("location: ../admin/home.php");
            } else {
                $_SESSION['message'] = 'Suppression annulée';
                header("location: ../admin/home.php");
            }
        } else {
            ?>
            <form id="suppr" method="get" action="">
                <p>Êtes vous sur de vouloir supprimer cet utilisateur ?</p>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="confirm" onclick="suppruser()" value="Oui">
                <input type="submit" name="confirm" onclick="nosuppruser()" value="Non">
            </form>
            <script>
                function suppruser() {
                    alert("La suppression du user a été éffectué  ! ");
                }
            </script>
            
            <script>
                function nosuppruser() {
                    alert("La suppression a été annulé ! ");
                }
            </script>
            
            
            
            
            <?php
            
        }
    } else {
        ?>
        <script>
                function nosuppruser() {
                    alert("Vous n\'avez pas accès à cette page ! ");
                }
            </script>
        <?php
        header('location: ../admin/home.php');
    }

?>
</body>
</html>