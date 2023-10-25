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