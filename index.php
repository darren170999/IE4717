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
            <!-- <li><a href="profile.php">UserProfile</a></li> -->
            <?php
            session_start();
            if (isset($_SESSION['valid_user'])) {
                echo '<li><a href="profile.php">UserProfile</a></li>';
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
                if (isset($_SESSION['valid_user'])) {
                    echo '<div class="welcome-message">Hello, ' . htmlspecialchars($_SESSION['valid_user']) . ' !</div>';
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
<!--FOOTER-->
<footer class="footer">
        <div class="footer-column">
            <div class="footer-logo">
                <a href="index.php">
                <img src="../IE4717/assets/img/full_logo.png" alt="Cinema Logo" />
                </a>
            </div>
            <div class="social-icons">
            <img src="../IE4717/assets/img/social_media_icons/facebook.png" alt="Facebook" />
            <img src="../IE4717/assets/img/social_media_icons/twitter.png" alt="Twitter" />
            <img src="../IE4717/assets/img/social_media_icons/instagram.png" alt="Instagram" />
            <img src="../IE4717/assets/img/social_media_icons/youtube.png" alt="YouTube" />
            <img src="../IE4717/assets/img/social_media_icons/tiktok.png" alt="Tik Tok" />
        </div>
        </div>

        <div class="footer-column sitemap">
            <!-- Sitemap links -->
            <a href="index.php">Our Movies</a>
            <a href="location.php">Our Locations</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="footer-column newsletter">
            <form id="newsletter-form">
                <label for="email-subscription">Subscribe To Our Newsletter</label>
                <div class="newsletter-input-group">
                <input type="email" id="email-subscription" placeholder="Enter your email" required />
                <button type="submit">Subscribe</button>
                </div>
                <p id="subscription-thankyou" style="display: none;">Thanks for subscribing!</p>
            </form>
        </div>

        <div class="footer-bottom">
            <small>
            <i>&copy; Copyright November 2023 by Darren Soh and Yin Qi Heng</i>
            </small>
        </div>
    </footer>
    <script src="../IE4717/assets/js/newsletter.js"></script>

</html>
