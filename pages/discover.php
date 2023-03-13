<?php
include '../config.php';
include '../interface/navbar.php';
?>
<html>
    <head>
        <link href="<?= SITE_URL ?>/style/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Select pour choisir le genre de film -->
        <h1 style="text-align: center; margin-top: 2rem;"> Quel genres de film voulez-vous voir ? </h1>
        <div class="genre-choice">
            <label for="genres">Choisir un genre :</label>
            <select name="genres" id="genres">
                <option value="">Sélectionner un genre</option>
            </select>
        </div>


<!-- Conteneur pour afficher les films -->
<div id="films-container"></div>

<script>
// Requête pour récupérer la liste des genres de films
fetch('https://api.themoviedb.org/3/genre/movie/list?api_key=819b3b9f2b6ec0428a3888d8c512ba08&language=fr')
  .then(response => response.json())
  .then(data => {
    const genresSelect = document.querySelector('#genres');

    // Ajouter chaque genre à la liste déroulante
    data.genres.forEach(genre => {
      const option = document.createElement('option');
      option.value = genre.id;
      option.text = genre.name;
      genresSelect.appendChild(option);
    });

    // Écouter le changement de sélection de genre
    genresSelect.addEventListener('change', () => {
      const selectedGenre = genresSelect.value;

      if (selectedGenre) {
        // Requête pour récupérer les films correspondant au genre sélectionné
        fetch(`https://api.themoviedb.org/3/discover/movie?api_key=819b3b9f2b6ec0428a3888d8c512ba08&language=fr&with_genres=${selectedGenre}`)
          .then(response => response.json())
          .then(data => {
            const filmsContainer = document.querySelector('#films-container');

            // Vider le conteneur des films précédents
            filmsContainer.innerHTML = '';

            // Ajouter chaque film dans le conteneur
            data.results.forEach(film => {
              const filmDiv = document.createElement('div');
              filmDiv.classList.add('film');
              filmDiv.innerHTML = `
                <a href="movie.php?id=${film.id}">
                    <img src="https://image.tmdb.org/t/p/w500/${film.poster_path}" alt="${film.title}">
                </a>
                <h3>${film.title}</h3>
             
                <p>${film.release_date.substring(0, 4)}</p>
              `;
              filmsContainer.appendChild(filmDiv);
            });
          })
          .catch(error => console.error(error));
      }
    });
  })
  .catch(error => console.error(error));
</script>


<style>
/* Style pour les films */
#films-container {
  display: flex;
  flex-wrap: wrap;
  margin: 0;
  justify-content: center;
  gap: 3rem;
}

.film {
  width: 20rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.film img {
  width: 100%;
  height: auto;
}

.film h3 {
  margin: 0.5rem 0 0;
  font-size: 1.2rem;
  text-align: center;
}

.film p {
  margin: 0.25rem 0;
  font-size: 0.9rem;
  color: #888;
}
</style>

    </body>
</html>

<?php
include '../interface/footer.php';
?>