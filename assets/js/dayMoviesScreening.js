const moviesEndpoint = "getAllMovies.php";
let movies = [];

function fetchMovies() {
    fetch(moviesEndpoint)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            movies = data; // Update the posters array with the fetched data
        })
        .catch((error) => console.error("Error fetching movies:", error));
}
fetchMovies();

document.addEventListener('DOMContentLoaded', function() {
    
    const tabButtons = document.querySelectorAll('.tab-button');
    const wml = document.getElementById('weekly-movie-listings');
    tabButtons.forEach(button => {
        console.log(button)
        button.addEventListener('click', () => {
            // Hide all movie listings
            const dayMovies = document.querySelectorAll('.day-movies');
            dayMovies.forEach(day => {
                day.style.display = 'none';
            });

            // Show the selected day's movies
            const selectedDay = button.getAttribute('data-day');
            console.log(selectedDay)
            const selectedDayMovies = document.getElementById(selectedDay + '-movies');
            selectedDayMovies.style.display = 'block';

            // Remove existing movie listings
            while (selectedDayMovies.querySelector('ul').firstChild) {
                selectedDayMovies.querySelector('ul').removeChild(selectedDayMovies.querySelector('ul').firstChild);
            }
            console.log(movies)

            const moviesForSelectedDay = movies.filter(movie => movie.days === selectedDay);
            if(moviesForSelectedDay.length > 0){
                moviesForSelectedDay.forEach(movie => {
                    const moviePoster = document.createElement('li');
                    moviePoster.className = 'movie-poster';

                    moviePoster.addEventListener('click', () => {
                        localStorage.setItem('selectedMovieName', movie.movie_title);
                        window.location.href = `booking.html?selectedMovieName=${encodeURIComponent(movie.movie_title)}`;
                    });

                    const movieLink = document.createElement('a');
                    movieLink.href = 'javascript:void(0)';
                    const movieImage = document.createElement('img');
                    movieImage.className = 'movie-image';
                    movieImage.src = 'data:image/jpeg;base64,' + movie.movie_data;
                    movieImage.alt = movie.movie_title;
                    movieImage.style.width = '500px';
                    movieLink.appendChild(movieImage);
                    moviePoster.appendChild(movieLink);
                    selectedDayMovies.querySelector('ul').appendChild(moviePoster);
                    
                });
            } else {
                //No Movies
                const noMoviesText = document.createElement('p');
                noMoviesText.textContent = "No movies showing today";
                selectedDayMovies.querySelector('ul').appendChild(noMoviesText);
            }
        });
    });
});