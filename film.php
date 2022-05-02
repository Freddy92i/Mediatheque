<?php
include "APP/ConnexionPDO.php";

$id = $_GET["id"];
$query = $bdd->prepare('SELECT film.id, film.nom, film.duree, film.resume, film.realisateur, film.img, categorie.categorie AS categorie FROM film INNER JOIN categorie ON film.RefCat = categorie.RefCat WHERE film.id = :id ORDER BY categorie.categorie');
$query->execute(['id' => $id]);
$result = $query->fetch();
$nom = $result[1];

$tab = ['id', 'nom', 'duree', 'resume'];
$i = 1;
// faire tous le html et c'est bon ?
while ($i < 4){
    echo $tab[$i]. ' : '. $result[$i];
    echo '<br>';
    $i++;
}
?>

<html>
    