const API_KEY = '819b3b9f2b6ec0428a3888d8c512ba08';
const moviesContainer = document.querySelector('.movies-container');

// Calculate date range for movies released in the last 12 months
const currentDate = new Date();
const currentYear = currentDate.getFullYear();
const currentMonth = currentDate.getMonth() + 1;
const currentDay = currentDate.getDate();
const releaseDate = new Date(currentYear - 1, currentMonth - 1, currentDay);
const releaseDateString = releaseDate.toISOString().split('T')[0];

// Fetch top rated movies released in the last 12 months
fetch(`https://api.themoviedb.org/3/discover/movie?api_key=${API_KEY}&language=en-US&sort_by=vote_average.desc&vote_count.gte=1000&release_date.gte=${releaseDateString}&page=1`)
  .then(response => response.json())
  .then(data => {
    data.results.forEach(movie => {
      const movieElement = document.createElement('div');
      movieElement.classList.add('movie');
      movieElement.innerHTML = `
        <img style="border-radius: 5px" src="https://image.tmdb.org/t/p/w200/${movie.poster_path}">
        <div class="movie-info">
          <h3>${movie.title}</h3>
          <p>Release Date: ${movie.release_date.substring(0, 4)}</p>
          <p>Rating: ${movie.vote_average}</p>
        </div>
      `;
      movieElement.addEventListener('click', () => {
        window.location.href = `movie.php?id=${movie.id}`;
      });
      moviesContainer.appendChild(movieElement);
    });
  })
  .catch(error => console.log(error));
