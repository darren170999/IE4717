const images = ["assets/img/movie-poster.png", "assets/img/movie-poster2.png"] // Add your image URLs

let index = 0;

function changeBackground() {
    document.getElementById('background-carousel').style.backgroundImage = `url(${images[index]})`;

    index = (index + 1) % images.length;
    setTimeout(changeBackground, 30000); // Change image every 5 seconds (adjust as needed)
}

changeBackground();