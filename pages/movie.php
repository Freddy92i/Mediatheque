<?php
include '../config.php';
?>
<header>
    <link href="<?= SITE_URL ?>/style/movie.css" rel="stylesheet">
    <link href="<?= SITE_URL ?>/style/style.css" rel="stylesheet">
</header>
<?php
include "../interface/navbar.php";

// Clé API TMDB
$api_key = "819b3b9f2b6ec0428a3888d8c512ba08";

// Récupérer l'ID du film depuis la variable GET
$movie_id = $_GET['id'];

// URL pour récupérer les informations du film
$url = "https://api.themoviedb.org/3/movie/$movie_id?api_key=$api_key&language=fr&append_to_response=credits,videos,recommendations";

// Récupérer les données depuis l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Afficher les informations du film


echo "<img class='cover' src='https://image.tmdb.org/t/p/original{$data['backdrop_path']}' alt='{$data['title']}'>";
echo "<h1 class='titre'> {$data['title']}</h1>";
echo "<img class='poster' src='https://image.tmdb.org/t/p/w300{$data['poster_path']}' alt='{$data['title']}'>";
echo "<p class='annee'> <strong>Année :</strong> {$data['release_date']}</p>";
echo "<p class='note'> <strong>Note moyenne :</strong> {$data['vote_average']} /10</p>";
echo "<p class='genre'> <strong>Genres :</strong> ";
foreach($data['genres'] as $genre) {
    echo $genre['name'] . ", ";
}
echo "</p>";
echo "<h2 class='credits'> Synopsis</h2>";
echo "<p class='resume'> {$data['overview']}</p>";

// Afficher les crédits du film
echo "<h2 class='credits'> Crédits</h2>";
echo "<p class='realisateur'> <strong>Réalisateur :</strong> ";
$directors = array_filter($data['credits']['crew'], function($crew) {
    return $crew['job'] == "Director";
});
foreach($directors as $director) {
    echo $director['name'] . ", ";
}
echo "</p>";

echo "<h2 class='casting' >Casting</h2>";


// Récupérer les acteurs d'un film
$url = "https://api.themoviedb.org/3/movie/{$movie_id}/credits?api_key=819b3b9f2b6ec0428a3888d8c512ba08";
$credits = json_decode(file_get_contents($url));

// Afficher les photos des acteurs dans des cadres ronds
echo '<ul class="actors">';
foreach ($credits->cast as $actor) {
    // Récupérer la photo de l'acteur (ou une photo par défaut si indisponible)
    if ($actor->profile_path) {
        $photo_url = "https://image.tmdb.org/t/p/w185/{$actor->profile_path}";
    } else {
        $photo_url = "https://www.gravatar.com/avatar/default?s=185";
    }

    // Afficher la photo de l'acteur dans un cadre rond
    echo "<li class='actor-div'><a href='actor.php?id={$actor->id}'><img src=\"{$photo_url}\" class=\"actor-photo\" alt=\"{$actor->name}\"></a><br>{$actor->name}</li>";

}
echo '</ul>';

// Afficher les bandes-annonces du film
echo "<h2 class='BA' >Bandes-annonces</h2>";
foreach($data['videos']['results'] as $video) {
    if($video['site'] == "YouTube") {
        echo "<iframe  class='B-A' width='560' height='315' src='https://www.youtube.com/embed/{$video['key']}' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
    }
}

// Afficher les films recommandés
echo "<h2 class='reco'>Films recommandés</h2>";
echo "<ul style='list-style: none;'>";
foreach($data['recommendations']['results'] as $recommendation) {
    echo "<li>";
    echo "<a href='movie.php?id={$recommendation['id']}'><img style='width: 100px; height: 150px; object-fit: cover;' src='https://image.tmdb.org/t/p/w300{$recommendation['poster_path']}' alt='{$recommendation['title']}'></a>";
    echo "<br><a href='movie.php?id={$recommendation['id']}' style='text-decoration: none;'>{$recommendation['title']}</a>";
    echo "</li>";
}
echo "</ul>";

include "../interface/footer.php";

?>
