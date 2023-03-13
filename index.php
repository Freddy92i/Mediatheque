<?php
include 'config.php';
?>
<html>
    <head>
        <link href="<?= SITE_URL ?>/style/style.css" rel="stylesheet">
    </head>
<body style="background-color: #131c27;">

<?php
    include 'interface/navbar.php';
    include 'carousel.php';

// Clé API TMDB
$api_key = "819b3b9f2b6ec0428a3888d8c512ba08";

// URL pour récupérer les derniers films sortis en date
$url = "https://api.themoviedb.org/3/movie/now_playing?api_key=$api_key&language=fr&page=1&region=FR";

// Récupérer les données depuis l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Afficher les films dans une liste horizontale sur fond noir
echo "<div style='background-color: #000617 ;'>";
echo '<div style="text-align: center; padding-top: 1rem;"><a class="texte-sf" style="color: #E0E0E0; padding-bottom: 1rem;";> NOUVEAUTÉS </a>';

echo "<ul style='display: flex; list-style: none; overflow-x: scroll;'>";
foreach($data['results'] as $movie) {
    echo "<li style='margin-right: 25px; text-align: center;'>";
    echo "<a href='<?= SITE_URL ?>/pages/movie.php?id={$movie['id']}' ><img style='width: 200px;height: 300px;object-fit: cover;border-radius: 10px;' src='https://image.tmdb.org/t/p/w200{$movie['poster_path']}' alt='{$movie['title']}'></a><br>";
    echo "<a style='text-decoration: none;width: 10rem; margin: auto;' href='<?= SITE_URL ?>/pages/movie.php?id={$movie['id']}'>{$movie['title']}</a>";
    echo "</li>";
}
echo "</ul>";

echo "</div>";

// Sélection de films de SF


// Configuration de l'URL de l'API
$url = "https://api.themoviedb.org/3/discover/movie";
$url .= "?api_key={$api_key}";
$url .= "&with_genres=878"; // ID du genre de science-fiction
$url .= "&sort_by=release_date.desc";
$url .= "&page=1";

// Récupération des données JSON de l'API
$data = file_get_contents($url);

// Conversion des données JSON en tableau associatif
$data = json_decode($data, true);

// Affichage des 5 derniers films de science-fiction
if (isset($data['results'])) {
    $films = array_slice($data['results'], 0, 5);

    echo '<div class="block-selection"">';
    echo '<div style="text-align: center; padding-top: 2rem;color: #E0E0E0;"><p class="selection"> SÉLECTION</p>';
    echo '<div style="text-align: center; margin-top: 2rem;color: #E0E0E0;"> Science Fiction';
    ?>
    <a style="color: #E0E0E0;margin: auto;width: 50%;display: block; margin-top: 2rem;";>
        Explorez des mondes imaginaires incroyables et laissez-vous emporter par des histoires qui repoussent les limites de votre imagination.
        Découvrez des réflexions philosophiques fascinantes sur les enjeux technologiques et environnementaux qui vont façonner notre avenir.
        Vivez des émotions intenses en compagnie de héros courageux, dans des aventures temporelles, des voyages spatiaux et des univers dystopiques.
    </a>
    
    <?php
    echo '<ul style="list-style-type: none; margin-top: 2rem; display: flex;flex-wrap: nowrap;overflow-x: auto;margin-top: 2rem;padding: 0;justify-content: center;">';

    foreach ($films as $film) {
        $poster = "https://image.tmdb.org/t/p/w200/{$film['poster_path']}";
        $title = $film['title'];

        echo '<li style="margin-right: 10px;">';
        echo '<a href="<?= SITE_URL ?>/pages/movie.php?id='.$film['id'].'">';
        echo '<img class="affiche-film" src="'.$poster.'" alt="'.$title.'" style="width: 100%; border-radius: 10px;">';
        echo '<div style="text-align: center; color: #E0E0E0 ; margin-top: 5px;">'.$title.'</div>';
        echo '</a>';
        echo '</li>';
    }

    if (count($data['results']) > 5) {
        $count = count($data['results']) - 5;
        echo '<li style="margin-right: 10px;">';
        echo '<div style="border: solid black;background: black;width: 100%;height: 91%;border-radius: 10px;text-align: center;color: #fff;display: flex;flex-direction: column;justify-content: center;">+'.$count.' films de science-fiction</div>';
        echo '</li>';
    }

    echo '</ul>';
    echo '</div>';
}
?>

<a href="pages/discover.php?genre=878">
  <button class="btn-voirplus">
    <i class="fa fa-plus"></i> Voir toute la sélection 
  </button>
</a>

<?php

// URL pour récupérer les films les mieux notés en date
$url = "https://api.themoviedb.org/3/movie/top_rated?api_key=$api_key&language=fr&page=1&region=FR";

// Récupérer les données depuis l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Afficher les films dans une liste horizontale sur fond noir
echo "<div style='background-color: #000617 ;'>";
echo '<div style="text-align: center; padding-top: 1rem;"><a class="texte-sf" style="color: #E0E0E0; padding-bottom: 1rem;";> LES MIEUX NOTÉS </a>';

echo "<ul style='display: flex; list-style: none; overflow-x: scroll;'>";
foreach($data['results'] as $movie) {
    echo "<li style='margin-right: 25px; text-align: center;'>";
    echo "<a href='<?= SITE_URL ?>pages/movie.php?id={$movie['id']}' ><img style='width: 200px;height: 300px;object-fit: cover;border-radius: 10px;' src='https://image.tmdb.org/t/p/w500{$movie['poster_path']}' alt='{$movie['title']}'></a><br>";
    echo "<a style='text-decoration: none;width: 10rem; margin: auto;' href='<?= SITE_URL ?>pages/movie.php?id={$movie['id']}' >{$movie['title']}</a>";
    echo "</li>";
}
echo "</ul>";

echo "</div>";


// films a venir 

// URL pour récupérer les films qui vont sortir prochainement.

$url = "https://api.themoviedb.org/3/movie/upcoming?api_key=$api_key&language=fr&page=1&region=FR";

// Récupérer les données depuis l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Afficher les films dans une liste horizontale sur fond noir
echo "<div style='background-color: #000617 ;'>";
echo '<div style="text-align: center; padding-top: 1rem;"><a class="texte-sf" style="color: #E0E0E0; padding-bottom: 1rem;";> PROCHAINEMENT... </a>';

echo "<ul style='display: flex; list-style: none; overflow-x: scroll;'>";
foreach($data['results'] as $movie) {
    echo "<li style='margin-right: 25px; text-align: center;'>";
    echo "<a href='<?= SITE_URL ?>/pages/movie.php?id={$movie['id']}' ><img style='width: 200px;height: 300px;object-fit: cover;border-radius: 10px;' src='https://image.tmdb.org/t/p/w500{$movie['poster_path']}' alt='{$movie['title']}'></a><br>";
    echo "<a style='text-decoration: none;width: 10rem; margin: auto;' href='<?= SITE_URL ?>/pages/movie.php?id={$movie['id']}' >{$movie['title']}</a>";
    echo "</li>";
}
echo "</ul>";

echo "</div>";

include 'interface/footer.php';
?>

</body>