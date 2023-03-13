<?php

// Récupération des données des films populaires sur l'API TMDB

// Clé API TMDB
$api_key = "819b3b9f2b6ec0428a3888d8c512ba08";

$apiUrl = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key&language=fr-FR&page=1";
$apiResponse = file_get_contents($apiUrl);
$apiData = json_decode($apiResponse, true);

// Affichage des films dans un carrousel
echo '<div class="carousel">';
foreach($apiData['results'] as $movie) {
  // Récupération des informations du film
  $title = $movie['title'];
  $director = 'Inconnu';
  $directorId = $movie['id'];
  $apiUrl = "https://api.themoviedb.org/3/movie/$directorId/credits?api_key=$api_key&language=fr-FR";
  $apiResponse = file_get_contents($apiUrl);
  $apiData = json_decode($apiResponse, true);
  foreach($apiData['crew'] as $crewMember) {
    if($crewMember['job'] === 'Director') {
      $director = $crewMember['name'];
      break;
    }
  }
  $year = substr($movie['release_date'], 0, 4);
  $rating = $movie['vote_average'];
  $imageUrl = "https://image.tmdb.org/t/p/original" . $movie['backdrop_path'];
  $movieUrl = "pages/movie.php?id=" . $movie['id'];

  // Affichage du film dans une carte du carrousel
  echo '<a class="slide" href="'.$movieUrl.'">';
  echo '<div class="carousel-card" style="background-image:url('.$imageUrl.');">';
  echo '<div class="carousel-card-content">';
  echo '<h2>'.$title.'</h2>';
  echo '<p>De '.$director.'</p>';
  echo '<p style="margin-top:-0.5rem;style="margin-bottom:-0.5rem;"">'.$year.'</p>';
  echo '</div>';
  echo '</div>';
  echo '</a>';
}
echo '</div>';


?>
<div class="controls">
    <button class="prev-btn">&lt;</button>
    <button class="next-btn">&gt;</button>
  </div>

<script type="text/javascript" src="pages/slider.js"></script> 


<style>
  /* Style pour le carrousel */
  .carousel {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    height: 100vh;
    width: 100%;
    -webkit-overflow-scrolling: touch;
  }
  .carousel a, .carousel a:hover {
      text-decoration: none;
  }

  .carousel-card {
    flex: 0 0 auto;
    width: 100vw;
    height: 100vh;
    scroll-snap-align: start;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    background-size: cover;
    background-position: center;
  }

  .carousel-card-content {
    background-color: rgba(0, 0, 0, 0.3);
    padding: 1rem;
    color: #E0E0E0;
    text-align: center;
    text-decoration: none!important;
    margin: 1rem 0 0 1rem;
    border-radius: 2rem
  }
  .controls {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 100%;
  display: flex;
  justify-content: space-between;
  z-index: 1;
}

.prev-btn,
.next-btn {
  font-size: 3rem;
  background-color: transparent;
  color:#E0E0E0;
  border: none;
  cursor: pointer;
  padding: 0 1rem;
}

.prev-btn:focus,
.next-btn:focus {
  outline: none;
}
</style>
