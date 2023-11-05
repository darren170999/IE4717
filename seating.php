<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Frames Booking Page</title>

    <link rel="stylesheet" href="../IE4717/assets/css/style_seating.css"> 
</head>
<body style="background-color: black;">
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
    <br>
    <br><br>
    <br><br>
    <div class="movie-screen">
        <div class="screen-content">
            <h2>Movie Screen</h2>
        </div>
    </div>
    <br><br>
    <div class="seating-plan">
        <!-- Example: 10 rows, each with 10 seats -->

        <!-- Add more row divs for additional rows of seats -->
    </div>
    <div class="legend">
        <h3>Legend</h3>
        <div class="legend-item">
            <div class="color-code selected"></div>
            <span>Selected </span>&nbsp;&nbsp;
            <div class="color-code unselected"></div>
            <span>Unselected</span><br>&nbsp;&nbsp;
            <div class="color-code booked"></div>
            <span>Booked</span>
        </div>
    </div>
    <div class="selected-seats-container">
        <h3>Selected Seats</h3>
        <ul id="selected-seats-list"></ul>
        <p id="datetime-info"></p>
        <form id="update" action="updateEverything.js" method="POST">
        <input type="submit" name="buy-button" value="Confirm" id="buy-button">
        </form>
    </div>
    <script src="../IE4717/assets/js/arrangements.js"></script>
    <!-- <script src="../IE4717/assets/js/refresh.js"></script> -->
    <!-- <script defer src="../IE4717/assets/js/seats.js"></script> -->
    <script src="../IE4717/assets/js/updateEverything.js"></script>
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
