<?php include('assets/php/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="#home">
                <img id="home-logo" src="../IE4717/assets/img/pureframeofficiallogodesign-1.png">
                <img id="home-logo" src="../IE4717/assets/img/name-only-11.png"> 
            </a>
        </div>
        <ul class="nav-list">
            <li><a href="#Location">Location</a></li>
            <li><a href="#Contact">Contact</a></li>
            <li><a href="#UserProfile">UserProfile</a></li>
            <li><a href="#loginSignUp">Login/SignUp</a></li>
        </ul>
    </div>
    <div class="section" id="background-carousel">
        <div class="content">
            <h1>Welcome to Pureframes</h1>
            <p>xxx.</p>
        </div>
    </div>
    <div class="new-movies-headers">
        NEW MOVIES
    </div>

    <div class="movie-list">
        <!-- Not hardcoded, eventually will pull from DB -->
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/rectangle-763.png" alt="Movie 1">
            <h3 class="movie-title">Movie Title 1</h3>
            <p class="movie-rating">Rating: 4.5</p>
        </div>
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/rectangle-763.png" alt="Movie 2">
            <h3 class="movie-title">Movie Title 1</h3>
            <p class="movie-rating">Rating: 4.5</p>
        </div>
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/rectangle-763.png" alt="Movie 3">
            <h3 class="movie-title">Movie Title 1</h3>
            <p class="movie-rating">Rating: 4.5</p>
        </div>
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/rectangle-763.png" alt="Movie 4">
            <h3 class="movie-title">Movie Title 1</h3>
            <p class="movie-rating">Rating: 4.5</p>
        </div>
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/rectangle-763.png" alt="Movie 5">
            <h3 class="movie-title">Movie Title 1</h3>
            <p class="movie-rating">Rating: 4.5</p>
        </div>
    </div>
    <div class="navbar">
        <button class="tab-button" data-day="monday">Monday</button>
        <button class="tab-button" data-day="tuesday">Tuesday</button>
        <button class="tab-button" data-day="wednesday">Wednesday</button>
        <button class="tab-button" data-day="thursday">Thursday</button>
        <button class="tab-button" data-day="friday">Friday</button>
        <button class="tab-button" data-day="saturday">Saturday</button>
        <button class="tab-button" data-day="sunday">Sunday</button>
    </div>
    <div class="movies">
        <div div class="day-movies" id="monday-movies">
            <h3>Monday's Movies</h3>
            <ul>
                <li class="movie-poster">
                    <img class="movie-image" src="../IE4717/assets/img/avengers.png" alt="Monday Movie 1">
                </li>
            </ul>
        </div>
        <div div class="day-movies" id="tuesday-movies">
            <h3>Tuesday's Movies</h3>
            <ul>
                <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li>
            </ul>
        </div>
    </div>

    <div class="upcoming-movies-headers">
        UPCOMING MOVIES
    </div>
    <div class="movie-list">
        <!-- Not hardcoded, eventually will pull from DB -->
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/nun.png" alt="Movie 1">
            <h3 class="movie-title">Movie Title 1</h3>
        </div>
        <div class="movie-poster">
            <img class ="movie-image" src="../IE4717/assets/img/barbie.png" alt="Movie 2">
            <h3 class="movie-title">Movie Title 1</h3>
        </div>
    </div>

    <script src="../IE4717/assets/js/rotateBackground.js"></script>
    <script src="../IE4717/assets/js/dayMoviesScreening.js"></script>
</body>
</html>
