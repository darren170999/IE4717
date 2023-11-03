<?php 
session_start();
include('assets/php/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Profile</title>
    <link rel="stylesheet" href="style_yinqi.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;  /* 100% of the viewport height */
            background-color: #000000;
        }

        .main-content {
            width: 80%;
            height: 80%;
            display: flex;
            flex-direction: column;
            border: 2px solid #000;
        }

        .upper-section {
            flex: 0.5;  /* 50% */
            background-image: url("./assets/img/profile_background.png");
            padding: 20px;
            color: #ffffff;
        }

        .lower-section {
            flex: 0.5;  /* 50% */
            background-color: #000;
            padding: 20px;
            color: #ffffff;
        }
        /* Style the buttons that are used to open and close the accordion panel */
        .accordion {
            background-color: #000;
            color: #FFF;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: solid 1px #FFC300;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            font-weight: bold;
            font-size: 20px;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS) */
        .active, .accordion:hover {
            background-color: #FFC300;
            color: #000000;
        }

        /* Style the accordion panel. Note: hidden by default */
        .panel {
            padding: 10px 18px;
            background-color: #262626;
            display: none;
            overflow: hidden;
        }

        .booking-history {
            display: flex;
            justify-content: flex-start;  /* This will align the items to the left */
        }

        .booking-item {
            flex: 0 0 auto;  
            text-align: center;
            margin-right: 20px;
            max-width: 150px;  /* Constrain the size */
        }

        .booking-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .booking-item p {
            text-align: center;
            margin-top: 10px;
        }

        .booking-item img:last-child {
            width: auto;
            height: auto;
        }

        #rating{
            width:30%;
        }

        .setting-row {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .setting-title {
            align-self: flex-start;
        }

        input, select, button {
            width: 100%;
        }
        .delete-account-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .info-line {
            margin-bottom: 15px;
            text-align: left;
        }
        #buttonContainer {
            display: flex;
            justify-content: center;
        }

        .review-container {
            display: flex;
            justify-content: space-between;
            border: 1px solid #FFC300;
            padding: 10px;
            margin-bottom: 10px;
        }

        .review-left, .review-right {
            padding: 10px;
        }

        .review-left {
            flex: 0.2;
        }

        .review-right {
            flex: 0.8;
            text-align: left;
        }

        .movie-poster {
            width: 60%;
            height: auto;
        }

        .movie-title {
            font-size: 24px;
            margin-top: 0;
        }

        .star-ratings {
            width: 15%;
            height: auto;
        }

        .movie-genre {
            font-style: italic;
            font-size: small;
        }

        .user-review {
            margin-top: 10px;
        }

        /* The Modal */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed position */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        background-color: rgba(0,0,0,0.4); /* Black with opacity */
        }

        /* Modal Content */
        .modal-content {
        position: relative;  
        background-color: #000;
        color: #FFF;
        margin: 15% auto; /* Center it */
        padding: 20px;
        border: 1px solid #FFC300;
        border-radius: 20px;
        width: 40%; /* Could be more or less, depending on screen size */
        }

        #modal-qr {
        width: 40%;  /* You can adjust this */
        height: auto;
        }
        .close {
        position: absolute;
        top: 30px;
        right: 30px;  /* Changed from 'left' to 'right' */
        cursor: pointer;
        font-weight: bold;
        font-size: 30px;
        }
    </style>
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Upper Section -->
        <div class="upper-section">
            <img src="./assets/img/profile_picture.png" style="width: 30%;">
            <h1>Hello, Chang!</h1>
        </div>
        
        <!-- Lower Section -->
        <div class="lower-section">
            <h1 id="title">MY PROFILE PAGE</h1>

            <button class="accordion">Personal Information</button>
            <div class="panel">
            <div class="info-line">
                <strong>Name:</strong>
                <span id="nameSpan">Chang Ah Kau</span>
                <input type="text" id="nameInput" style="display:none;">
            </div>
            <div class="info-line">
                <strong>Email Address:</strong>
                <span id="emailSpan">changahkau@gmail.com</span>
                <input type="text" id="emailInput" style="display:none;">
            </div>
            <div class="info-line">
                <strong>Contact Information:</strong>
                <span id="contactSpan">+65 1234 5678</span>
                <input type="text" id="contactInput" style="display:none;">
            </div>
            <div class="info-line">
                <strong>Preferred Genre:</strong>
                <span id="genreSpan">Action, Comedy</span>
                <input type="text" id="genreInput" style="display:none;">
              </div>              
            <div class="info-line">
                <strong>Account Creation Date:</strong>
                <span id="dateSpan">23 October 2023</span>
            </div>
            <div id="buttonContainer">
                <button type="button" class="btn" id="editBtn">Edit Information</button>
                <button type="button" class="btn" id="saveBtn" style="display:none;">Save</button>
            </div>
            </div>

            <button class="accordion">Booking History</button>
            <div class="panel">
                <div class="booking-history">
                    <div class="booking-item">
                    <img src="./assets/img/movie_posters/Oppenheimer.png" id="oppenheimer-poster">
                        <p>Oppenheimer</p>
                        <img src="./assets/img/ratings/5_star_rating.png" id="rating">
                    </div>
                    <div class="booking-item">
                        <img src="./assets/img/movie_posters/Black Panther.png" id="blackpanther-poster">
                        <p>Black Panther</p>
                        <img src="./assets/img/ratings/4_star_rating.png" id="rating">
                    </div>
                    <div class="booking-item">
                        <img src="./assets/img/movie_posters/Barbie.png" id="barbie-poster">
                        <p>Barbie</p>
                        <img src="./assets/img/ratings/3_star_rating.png" id="rating">
                    </div>
                </div>
            </div>

            <button class="accordion">My Wishlist</button>
            <div class="panel">
                <div class="booking-history">
                    <div class="booking-item">
                        <img src="./assets/img/movie_posters/Confinement.png">
                        <p>Confinement</p>
                        <img src="./assets/img/ratings/4_star_rating.png" id="rating">
                    </div>
                    <div class="booking-item">
                        <img src="./assets/img/movie_posters/No More Bets.png">
                        <p>No More Bets</p>
                        <img src="./assets/img/ratings/3_star_rating.png" id="rating">
                    </div>
                    <div class="booking-item">
                        <img src="./assets/img/movie_posters/Expend4bles.png">
                        <p>Expend4bles</p>
                        <img src="./assets/img/ratings/5_star_rating.png" id="rating">
                    </div>
                    <div class="booking-item">
                        <img src="./assets/img/movie_posters/Joker.png">
                        <p>Joker</p>
                        <img src="./assets/img/ratings/3_star_rating.png" id="rating">
                    </div>
                </div>
            </div>

            <button class="accordion">Reviews and Ratings</button>
            <div class="panel">
                <div class="review-container">
                    <!-- Left Side for Movie Poster -->
                    <div class="review-left">
                    <img src="./assets/img/movie_posters/Oppenheimer.png" class="movie-poster">
                    </div>
                    <!-- Right Side for Movie Details and Review -->
                    <div class="review-right">
                        <h2 class="movie-title">OPPENHEIMER</h2>
                        <img src="./assets/img/ratings/5_star_rating.png" class="star-ratings">
                        <p class="movie-genre">Drama | History | Thriller | Mystery</p>
                        <div class="user-review">
                            <strong>Reviews Written:</strong>
                            <p>Movie was absolutely stunning! The cinematography was top-notch, and the performances were unforgettable. A must-watch!</p>
                        </div>
                    </div>
                </div>
                <div class="review-container">
                    <!-- Left Side for Movie Poster -->
                    <div class="review-left">
                    <img src="./assets/img/movie_posters/Black Panther.png" class="movie-poster">
                    </div>
                    <!-- Right Side for Movie Details and Review -->
                    <div class="review-right">
                        <h2 class="movie-title">BLACK PANTHER</h2>
                        <img src="./assets/img/ratings/4_star_rating.png" class="star-ratings">
                        <p class="movie-genre">Action | Superhero | Science Fiction | Fantasy</p>
                        <div class="user-review">
                            <strong>Reviews Written:</strong>
                            <p>This movie brings something unique to the cinema world. Cinematography, direction, acting all are to the point.</p>
                        </div>
                    </div>
                </div>
                <div class="review-container">
                    <!-- Left Side for Movie Poster -->
                    <div class="review-left">
                    <img src="./assets/img/movie_posters/Barbie.png" class="movie-poster">
                    </div>
                    <!-- Right Side for Movie Details and Review -->
                    <div class="review-right">
                        <h2 class="movie-title">BARBIE</h2>
                        <img src="./assets/img/ratings/3_star_rating.png" class="star-ratings">
                        <p class="movie-genre">Comedy | Romance | Adventure | Narrative</p>
                        <div class="user-review">
                            <strong>Reviews Written:</strong>
                            <p>The hype behind the movie made me have high expectations. I dressed up in my cute pink outfit and went to watch it, but was very disappointed, as, i found it to be quite mediocre.</p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="accordion">Delete Account</button>
            <div class="panel">                
                <!-- Delete Account -->
                <div class="setting-row delete-account-row">
                    <a href="#" class="btn" id="deleteAccount">Delete</a>
                </div>
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- The Modal Content -->
                <div class="modal-content" style="text-align: center;">
                    <span class="close">&times;</span>
                    <h2 id="modal-title" style="color:#FFC300; font-weight: bold;">OPPENHEIMER</h2>
                    <p style="padding:10px;">The QR Code that has been generated is your ticket to the cinema hall. 
                        <br>Scan the QR code at entry gate of cinema hall to enter.</p>
                    <img id="modal-qr" src="./assets/img/movie_qr.png" alt="QR Code">
                </div>
            </div>


        </div>
    </div>
    <script src="../IE4717/assets/js/profile.js"></script>
</body>
</html>
