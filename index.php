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
            <li><a href="location.php">Location</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="profile.php">UserProfile</a></li>
            <?php
            session_start();
            if (isset($_SESSION['valid_user'])) {
                if($_SESSION['valid_user'] === 'SuperAdmin'){
                    echo '<li><a href="admin.php">Admin</a></li>';
                }
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="loginSignUp.php">Login/SignUp</a></li>';
            }
            ?>
            <!-- <li><a href="loginSignUp.php">Login/SignUp</a></li> -->
        </ul>
    </div>
    <div class="section" id="background-carousel">
        <div class="content">
            <h1>Welcome to Pureframes</h1>
            <?php 
            session_start();
            if (isset($_SESSION['valid_user'])) {
                echo 'Welcome, ' . $_SESSION['valid_user'];
            }
        ?>
            <p>xxx.</p>
        </div>
    </div>

    </div>
    <div class="navbar"></div>
    <div class="movies" id="weekly-movie-listings">
        <!-- Get from DB -->
        <div class="day-movies" id="Monday-movies">
        <h3>Monday's Movies</h3>
        <ul></ul>
        </div>
        <div class="day-movies" id="Tuesday-movies">
        <h3>Tuesday's Movies</h3>
        <ul></ul>
        </div>
        <div class="day-movies" id="Wednesday-movies">
        <h3>Wednesday's Movies</h3>
        <ul></ul>
        </div>
        <div class="day-movies" id="Thursday-movies">
        <h3>Thursday's Movies</h3>
        <ul></ul>
        </div>
        <div class="day-movies" id="Friday-movies">
        <h3>Friday's Movies</h3>
        <ul></ul>
        </div>
        <div class="day-movies" id="Saturday-movies">
        <h3>Saturday's Movies</h3>
        <ul></ul>
        </div>
        <div class="day-movies" id="Sunday-movies">
        <h3>Sunday's Movies</h3>
        <ul></ul>
        </div>
    </div>

    <div class="new-movies-headers">
        Upcoming Movies
    </div>

    <div class="movie-list" id="movie-list">

    </div>
    <!-- <script src="../IE4717/assets/js/fetchMovies.js"></script> -->
    <script src="../IE4717/assets/js/rotateBackground.js"></script>
    <script src="../IE4717/assets/js/createRoutineNavbar.js"></script>
    <script src="../IE4717/assets/js/showUpcomingMovies.js"></script>
    <script src="../IE4717/assets/js/dayMoviesScreening.js"></script>
</body>
<footer>    
    <div id="footer-copyright">
        <small><i>Copyright &copy; 2023 PureFrames</i></small>
    </div>
</footer>
</html>
