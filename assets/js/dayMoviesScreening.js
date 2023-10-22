const moviesEndpoint = "getAllMovies.php";
let movies = [];

function fetchMovies() {
    fetch(moviesEndpoint)
        .then((response) => response.json())
        .then((data) => {
            // console.log(data)
            movies = data; // Update the posters array with the fetched data
        })
        .catch((error) => console.error("Error fetching advertisements:", error));
}

document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    fetchMovies();
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Hide all movie listings
            const dayMovies = document.querySelectorAll('.day-movies');
            dayMovies.forEach(day => {
                day.style.display = 'none';
            });

            // Show the selected day's movies
            const selectedDay = button.getAttribute('data-day');
            const selectedDayMovies = document.getElementById(selectedDay + '-movies');
            selectedDayMovies.style.display = 'block';

            // Remove existing movie listings
            while (selectedDayMovies.querySelector('ul').firstChild) {
                selectedDayMovies.querySelector('ul').removeChild(selectedDayMovies.querySelector('ul').firstChild);
            }

            // Create movie listings based on the data for the selected day
            if (movies[selectedDay]) {
                movies[selectedDay].forEach(movie => {
                    const moviePoster = document.createElement('li');
                    moviePoster.className = 'movie-poster';
                    const movieLink = document.createElement('a');
                    movieLink.href = 'booking.html';
                    const movieImage = document.createElement('img');
                    movieImage.className = 'movie-image';
                    movieImage.src = 'data:image/jpeg;base64,' + movie.movie_data;
                    movieImage.alt = movie.movie_title;
                    movieLink.appendChild(movieImage);
                    moviePoster.appendChild(movieLink);
                    selectedDayMovies.querySelector('ul').appendChild(moviePoster);
                });
            }
        });
    });
});

