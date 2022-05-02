<head>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>
<?php

    session_start();
    include('../APP/connexionPDO.php');
    if (!empty($_GET['filmid'])) // On récupère l'id du film et on le supprime
    {
        $id = $_GET['filmid'];

        if(!empty($_GET['confirm'])) {
            if($_GET['confirm'] == 'Oui') {
                $statement = $bdd->prepare("DELETE FROM film WHERE id = ?");
                $statement->execute(array($id));
                // Création de la session message pour y afficher le message de confirmation
                $_SESSION['message'] = 'Suppression effectué avec succès';
                header("Location: ../mediatheque.php");
            } else {
                $_SESSION['message'] = 'Suppression annulée';
                header("Location: ../mediatheque.php");
            }
        } else {
            ?>
            <form id="suppr" method="get" action="">
                <p>Êtes vous sur de vouloir supprimer ce film ?</p>
                <input type="hidden" name="filmid" value="<?php echo $id ?>">
                <input type="submit" name="confirm" value="Oui">
                <input type="submit" name="confirm" value="Non">
            </form>

            <?php
        }
    } else {
        $_SESSION['message']='Vous n\'avez pas accès à cette page';
        header('location: ../index.php');
    }

?>
</body>
</html>