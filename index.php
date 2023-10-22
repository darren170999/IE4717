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
            <a href="index.php">
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
        Upcoming Movies
    </div>

    <div class="movie-list" id="movie-list">

    </div>
    <div class="navbar" ">
        <button class="tab-button" data-day="monday">Monday</button>
        <button class="tab-button" data-day="tuesday">Tuesday</button>
        <button class="tab-button" data-day="wednesday">Wednesday</button>
        <button class="tab-button" data-day="thursday">Thursday</button>
        <button class="tab-button" data-day="friday">Friday</button>
        <button class="tab-button" data-day="saturday">Saturday</button>
        <button class="tab-button" data-day="sunday">Sunday</button>
    </div>
    <div class="movies" id="weekly-movie-listings">
        <!-- Get from DB -->
        <div div class="day-movies" id="monday-movies">
            <h3>Monday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster">
                    <img class="movie-image" src="../IE4717/assets/img/avengers.png" alt="Monday Movie 1">
                </li> -->
            </ul>
        </div>
        <div div class="day-movies" id="tuesday-movies">
            <h3>Tuesday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li> -->
            </ul>
        </div>
        <div div class="day-movies" id="wednesday-movies">
            <h3>Wednesday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li> -->
            </ul>
        </div>
        <div div class="day-movies" id="thursday-movies">
            <h3>Thursday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li> -->
            </ul>
        </div>
        <div div class="day-movies" id="friday-movies">
            <h3>Friday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li> -->
            </ul>
        </div>
        <div div class="day-movies" id="saturday-movies">
            <h3>Saturday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li> -->
            </ul>
        </div>
        <div div class="day-movies" id="sunday-movies">
            <h3>Sunday's Movies</h3>
            <ul>
                <!-- <li class="movie-poster"><img class="movie-image" src="../IE4717/assets/img/barbie.png" alt="Monday Movie 1"></li> -->
            </ul>
        </div>
    </div>

    <script src="../IE4717/assets/js/rotateBackground.js"></script>
    <script src="../IE4717/assets/js/dayMoviesScreening.js"></script>
    <script src="../IE4717/assets/js/showUpcomingMovies.js"></script>
</body>
<footer>
    <div id="footer-copyright">
        <small><i>Copyright &copy; 2023 PureFrames</i></small>
    </div>
</footer>
</html>
