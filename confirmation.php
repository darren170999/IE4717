<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed</title>

    <link rel="stylesheet" href="../IE4717/assets/css/style_confirmation.css"> 
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
    
    <!--Content-->
    <div class="main-content">
        <h1 id="title">EMAIL CONFIRMATION</h1>
        <div class="email-confirmation">
            <!-- Email Icon -->
            <img src="./assets/img/mail.png" alt="Mail Icon" class="email-icon">
            
            <!-- Thank You Message -->
            <h1>Thank you for booking with us!</h1>
            <p>The e-tickets have been sent to you via your email given to us.</p>
            
            <!-- Horizontal Line -->
            <hr class="confirmation-line">
            
            <!-- Resend Email or Contact Us -->
            <p>If you did not receive the tickets, <strong><a href="phpmailer.php" class="highlight-text link">resend email confirmation</a></strong> or <strong><a href="contact.php" class="highlight-text link">contact us</a></strong>.</p>
        </div>
        <div class="buttons">
            <a href="index.php" class="btn" id="home">Back to Home</a>
            <a href="profile.php" class="btn" id="ticket">My Bookings</a>
        </div>
    </div>
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