<?php
include '../config.php';
?>
<html>
<html>
    <head>
        <link href="<?= SITE_URL ?>/style/style.css" rel="stylesheet">
    </head>
<body style="background-color: #131c27;">
</html>
<?
// Clé API TMDB
$api_key = "819b3b9f2b6ec0428a3888d8c512ba08";

// Récupérer l'ID de l'acteur depuis la variable GET
$actor_id = $_GET['id'];

// URL pour récupérer les informations de l'acteur
$url = "https://api.themoviedb.org/3/person/$actor_id?api_key=$api_key&language=fr&append_to_response=movie_credits";

// Récupérer les données depuis l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Afficher les informations de l'acteur
echo "<h1>{$data['name']}</h1>";
echo "<img src='https://image.tmdb.org/t/p/w300{$data['profile_path']}' alt='{$data['name']}'>";
echo "<p><strong>Date de naissance :</strong> {$data['birthday']}</p>";
echo "<p><strong>Lieu de naissance :</strong> {$data['place_of_birth']}</p>";
echo "<h2>Films dans lesquels {$data['name']} a joué</h2>";

// Afficher les films dans lesquels l'acteur a joué
echo "<ul style='list-style: none; display: flex; flex-direction: row; flex-wrap: wrap; align-items: stretch ; gap: 1rem; justify-content: space-between;'>";
foreach($data['movie_credits']['cast'] as $movie) {
    echo "<li>";
    echo "<a href='movie.php?id={$movie['id']}'><img style='width: 100px; height: 150px; object-fit: cover;' src='https://image.tmdb.org/t/p/w300{$movie['poster_path']}' alt='{$movie['title']}'></a>";
    echo "<br><a href='movie.php?id={$movie['id']}' style='text-decoration: none;'>{$movie['title']}</a>";
    echo "</li>";
}
echo "</ul>";

include "../interface/footer.php";
?>
