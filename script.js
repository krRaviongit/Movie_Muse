const apiKey = "5d6588889a9109cbb0b1ac1fcc14264b";
const movieList = document.getElementById("movie-list");

const genreMap = {};

async function fetchGenres() {
  const res = await fetch(
    `https://api.themoviedb.org/3/genre/movie/list?api_key=${apiKey}`
  );
  const data = await res.json();
  data.genres.forEach((genre) => {
    genreMap[genre.id] = genre.name;
  });
}

async function fetchMovies() {
  movieList.innerHTML = ""; 
  const totalPagesToFetch = 3; 

  for (let page = 1; page <= totalPagesToFetch; page++) {
    const res = await fetch(
      `https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=en-US&page=${page}`
    );
    const data = await res.json();
    renderMovies(data.results);
  }
}

function renderMovies(movies) {
  movies.forEach((movie) => {
    const genres = movie.genre_ids.map((id) => genreMap[id]).join(", ");
    const movieCard = document.createElement("div");
    movieCard.classList.add("movie-card");
    movieCard.innerHTML = `
      <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}">
      <h3>${movie.title}</h3>
      <p class="genre">Genre: ${genres}</p>
      <p class="year">Year: ${movie.release_date.slice(0, 4)}</p>
      <a href="view_reviews.php?movie=${encodeURIComponent(movie.title)}">View Reviews</a>
    `;

    movieList.appendChild(movieCard);
  });
}

// Initialize
(async () => {
  await fetchGenres();
  await fetchMovies();
})();
