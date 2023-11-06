<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./assets/css/style_location.css">
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
            <?php
            session_start();
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
        </ul>
    </div>

    <div class="main-content">
        <h1 id="title">OUR LOCATIONS</h1>
        <div class="image-container">
            <img src="./assets/img/location.png" alt="Location Image">
        </div>
        <p class="instructions">To view cinema information and show times, please click on the cinema below.</p>
        <div class="button-container">
            <button class="btn location-btn" id="great-world-city">GREAT WORLD CITY</button>
            <button class="btn location-btn" id="jurong-point">JURONG POINT</button>
            <button class="btn location-btn" id="tiong-bahru-plaza">TIONG BAHRU PLAZA</button>
            <button class="btn location-btn" id="junction-8-bishan">JUNCTION 8 BISHAN</button>
            <button class="btn location-btn" id="suntec-city">SUNTEC CITY</button>
            <button class="btn location-btn" id="i12-katong">i12 KATONG</button>
        </div>
    </div>

    <!-- The Modal -->
    <div id="locationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-title">LOCATION: Placeholder</h2>
            <p id="modal-address">Address: </p>
            <p id="modal-email">Email Address: </p>
            <p id="modal-business-number">Business Number: </p>
            <p id="modal-opening-hours">Opening Hours: </p>
        </div>
    </div>


    <script src="./assets/js/location.js"></script>
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
