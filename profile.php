<?php 
include('assets/php/connect.php'); 
session_start();
if (isset($_SESSION['valid_user'])) {
    $username = $_SESSION['valid_user'];
}
$stmt = $conn->prepare("SELECT username, email, contact FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
if ($stmt->execute()) {
    error_log("Fetch users successful");
    $stmt->bind_result($username, $email, $contact);
    $stmt->fetch();
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Profile</title>
    <link rel="stylesheet" href="../IE4717/assets/css/style_profile.css">
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
                    echo '<li><a href="report.php">Report</a></li>';
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
            <img src="./assets/img/profile_pictures/natalie.png" style="width: 30%;">
            <h1>Hello, <?php echo $username ?>!</h1>
        </div>
        
        <!-- Lower Section -->
        <div class="lower-section">
            <h1 id="title">MY PROFILE PAGE</h1>

            <button class="accordion">Personal Information</button>
            <div class="panel">
            <div class="info-line">
                <strong>User Name:</strong>
                <span id="nameSpan"><?php echo $username ?></span>
                <input type="text" id="nameInput" style="display:none;">
            </div>
            <div class="info-line">
                <strong>Email Address:</strong>
                <span id="emailSpan"><?php echo $email ?></span>
                <input type="text" id="emailInput" style="display:none;">
            </div>
            <div class="info-line">
                <strong>Contact Information:</strong>
                <span id="contactSpan"><?php echo $contact ?></span>
                <input type="text" id="contactInput" style="display:none;">
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
                <form action="deleteAccount.php" method="POST">
                    <div class="setting-row delete-account-row">
                        Confirm your username to delete:
                        <input type="text" name="delConfirmUsername" id="delConfirmUsername"><br>
                       Confirm your Password to delete:
                        <input type="password" name="delConfirmPassword" id="delConfirmPassword"><br>
                        <input type="submit" id="deleteAccountButton" name="deleteAccountButton" value="Delete">
                        <!-- <a href="#" class="btn" id="deleteAccount">Delete</a> -->
                    </div>
                </form>
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
    <script src="../IE4717/assets/js/fetchUserDetails.js"></script>
    <!-- <script src="../IE4717/assets/js/deleteAccount.js"></script> -->
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
