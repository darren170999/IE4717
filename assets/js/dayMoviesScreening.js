// // script.js
// const tabButtons = document.querySelectorAll('.tab-button');
// const dayMovies = document.querySelectorAll('.day-movies');

// tabButtons.forEach(button => {
//     button.addEventListener('click', () => {
//         // Hide all movie listings
//         dayMovies.forEach(day => {
//             day.style.display = 'none';
//         });

//         // Show the selected day's movies
//         const selectedDay = button.getAttribute('data-day');
//         const selectedDayMovies = document.getElementById(selectedDay + '-movies');
//         selectedDayMovies.style.display = 'block';
//     });
// });
// dayMoviesScreening.js
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const dayMovies = document.querySelectorAll('.day-movies');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Hide all movie listings
            dayMovies.forEach(day => {
                day.style.display = 'none';
            });

            // Show the selected day's movies
            const selectedDay = button.getAttribute('data-day');
            const selectedDayMovies = document.getElementById(selectedDay + '-movies');
            selectedDayMovies.style.display = 'block';
        });
    });
});
