const moviesEndpoint = "getSelectedMovies.php";
let selectedMovie = [];
async function fetchMovies(selectedMovieName) {
    const url = `${moviesEndpoint}?selectedMovieName=${selectedMovieName}`;
    try {
        const response = await fetch(url); // Magic of the fetch promise;
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching movies:", error);
        return null;
    }
}
function setBackgroundImage(imageUrl) {
    document.body.style.backgroundImage = `url(${imageUrl})`;
    document.body.style.backgroundSize = 'cover';
    document.body.style.backgroundRepeat = 'no-repeat';
    document.body.style.backgroundAttachment = 'fixed';
    const titleElement = document.getElementById('title');
    const synopsisElement = document.getElementById('synopsis');
    if (selectedMovie[0].movie_title) {
        titleElement.textContent = selectedMovie[0].movie_title;
    }
    if (selectedMovie[0].sypnopsis) {
        synopsisElement.textContent = selectedMovie[0].sypnopsis;
    }
}
const selectedMovieName = localStorage.getItem('selectedMovieName');
if (selectedMovieName) {
    fetchMovies(selectedMovieName)
        .then((data) => {
            if (data !== null) {
                selectedMovie = data;
                anythingLah();
                localStorage.setItem('movie_title', selectedMovie[0].movie_title)
                localStorage.setItem('hall_id', selectedMovie[0].hall_id)
                localStorage.setItem('location_id', selectedMovie[0].location_id)
                localStorage.setItem('price', selectedMovie[0].price)
                localStorage.setItem('ratings', selectedMovie[0].ratings)
            }
        });
}
function anythingLah() {
    if (selectedMovie.length > 0) {
        const imageUrl = `data:image/jpeg;base64,${selectedMovie[0].movie_data}`;
        setBackgroundImage(imageUrl);
    }
}
