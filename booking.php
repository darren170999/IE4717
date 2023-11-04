<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Frames Booking Page</title>

    <link rel="stylesheet" href="assets/css/style_booking.css"> 
</head>
<body >
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
        </ul>
    </div>
    
    <div class="main-content">
        <h1 id="title"></h1>
        <p id="synopsis">During World War II, Lt. Gen. Leslie Groves Jr. appoints physicist J. Robert Oppenheimer to work on the top-secret Manhattan Project. Oppenheimer and a team of scientists spend years developing and designing the atomic bomb. Their work comes to fruition on July 16, 1945, as they witness the world's first nuclear explosion, forever changing the course of history.</p>
        <p id="instructions">Select time and date</p>
        
        <div class="date-boxes">
        </div>
        
        <div class="time-boxes">
            <div class="time-box">12:00 PM</div>
            <div class="time-box">03:00 PM</div>
            <div class="time-box active">05:00 PM</div>
            <div class="time-box">08:30 PM</div>
            <div class="time-box">10:00 PM</div>
        </div>
        
        <div class="buttons">
            <a href="index.php" class="btn" id="back">Back</a>
            <a href="seating.php" class="btn" id="reserve">Make Reservation</a>
        </div>
    </div>

     <!--FOOTER-->
     <footer class="footer">
        <div class="footer-column">
            <div class="footer-logo">
                <img src="../IE4717/assets/img/full_logo.png" alt="Cinema Logo" />
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
    <script src="../IE4717/assets/js/scriptBooking.js"></script>
    <script src="../IE4717/assets/js/fetchAssetsForBookings.js"></script>
</body>
</html>