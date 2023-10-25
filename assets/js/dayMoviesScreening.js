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

document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const currentDate = new Date();
    
    // Create an array to store the days within the next 7 days
    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    
    for (let i = 0; i < 7; i++) {
        const nextDate = new Date(currentDate);
        nextDate.setDate(currentDate.getDate() + i);
        const dayOfWeek = daysOfWeek[nextDate.getDay()];
        
        const button = document.createElement('button');
        button.className = 'tab-button';
        button.setAttribute('data-day', dayOfWeek.toLowerCase());
        button.textContent = dayOfWeek;
        document.querySelector('.navbar').appendChild(button);
    }
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
// tabButtons.forEach(button => {
//     button.addEventListener('click', () => {
//         // Hide all movie listings
//         const dayMovies = document.querySelectorAll('.day-movies');
//         dayMovies.forEach(day => {
//             day.style.display = 'none';
//         });

//         // Show the selected day's movies
//         const selectedDay = button.getAttribute('data-day');
//         const selectedDayMovies = document.getElementById(selectedDay + '-movies');
//         selectedDayMovies.style.display = 'block';

//         // Remove existing movie listings
//         while (selectedDayMovies.querySelector('ul').firstChild) {
//             selectedDayMovies.querySelector('ul').removeChild(selectedDayMovies.querySelector('ul').firstChild);
//         }

//         // Create movie listings based on the data for the selected day
//         if (movies[selectedDay]) {
//             movies[selectedDay].forEach(movie => {
//                 const moviePoster = document.createElement('li');
//                 moviePoster.className = 'movie-poster';
//                 const movieLink = document.createElement('a');
//                 movieLink.href = 'booking.html';
//                 const movieImage = document.createElement('img');
//                 movieImage.className = 'movie-image';
//                 movieImage.src = 'data:image/jpeg;base64,' + movie.movie_data;
//                 movieImage.alt = movie.movie_title;
//                 movieLink.appendChild(movieImage);
//                 moviePoster.appendChild(movieLink);
//                 selectedDayMovies.querySelector('ul').appendChild(moviePoster);
//             });
//         }
//     });
// });

