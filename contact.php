<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../IE4717/assets/css/style_contact.css">
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

    <div class="main-content">
        <!-- Left Side -->
        <div class="left-side">
            <img src="./assets/img/full_logo.png" alt="Pureframe Logo" width="60%">
            <h3>ADDRESS</h3>
            <p>Temasek Boulevard #03-373 <br>Suntec City Mall Singapore 038983</p>
            <h3>EMAIL</h3>
            <p>Email us at <a href="support@pureframes.com.sg" style="text-decoration: none;color: #FFFFFF;"><em><u>support@pureframes.com.sg</em></u></a></p>
            <h3>BUSINESS PHONE NUMBER</h3>
            <p>Contact us at <em><u>+65 1234-5678</em></u></p>
            <h3>OFFICE BUSINESS HOURS</h3>
            <p>10am to 5.30pm <br>(Mondays to Fridays, except on public holidays)</p>
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <h2>SEND A MESSAGE</h2>
            <hr>
            <form class="contact-form">
                <label for="name">NAME*:</label>
                <input type="text" id="name" name="name" class="form-input" required placeholder="Enter your name">

                <label for="email">EMAIL*:</label>
                <input type="email" id="email" name="email" class="form-input" required placeholder="Enter your email address">

                <label for="message">MESSAGE*:</label>
                <textarea id="message" name="message" class="form-textarea" required placeholder="Provide details to help us understand your problem"></textarea>

                <button type="submit" class="btn">Send Message</button>
            </form>
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
