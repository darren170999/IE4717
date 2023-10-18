const moviePostersEndpoint = "getMovies.php";
let posters = [];

function fetchMoviePosters() {
    fetch(moviePostersEndpoint)
        .then((response) => response.json())
        .then((data) => {
            // console.log(data)
            posters = data; // Update the posters array with the fetched data
        })
        .catch((error) => console.error("Error fetching advertisements:", error))
        .finally(() => {
            createPosters();
        });
}

function createPosters() {
    if (posters.length > 0) {
        // const imageURL = `data:image/jpeg;base64,${posters[index].data}`;
        // document.getElementById('movie-list').style.backgroundImage = `url(${imageURL})`;
        // Clear the existing movie posters
        const movieList = document.getElementById('movie-list');
        movieList.innerHTML = '';

        for (let i = 0; i < posters.length; i++) {
            const imageURL = `data:image/jpeg;base64,${posters[i].data}`;

            const moviePosterDiv = document.createElement('div');
            moviePosterDiv.className = 'movie-poster';

            const movieImage = document.createElement('img');
            movieImage.className = 'movie-image';
            movieImage.src = imageURL;
            movieImage.alt = `Movie ${i + 1}`;

            const movieTitle = document.createElement('h3');
            movieTitle.className = 'movie-title';
            movieTitle.textContent = `Movie Title ${i + 1}`;

            const movieRating = document.createElement('p');
            movieRating.className = 'movie-rating';
            movieRating.textContent = 'Rating: 4.5';

            moviePosterDiv.appendChild(movieImage);
            moviePosterDiv.appendChild(movieTitle);
            moviePosterDiv.appendChild(movieRating);

            movieList.appendChild(moviePosterDiv);
        }

    }

}

fetchMoviePosters();