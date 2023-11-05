<?php
session_start(); // Start the session (if not already started)

if (isset($_SESSION['valid_user'])) {
    $username = $_SESSION['valid_user'];
    // You now have the user's username in the $username variable
} else {
    // The session 'valid_user' is not set, so the user is not logged in.
    // You can handle this case as needed, e.g., redirect to a login page.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="../IE4717/assets/css/style_payment.css">
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

    <!--Content-->
    <div class="main-content">
        <div class="left-column">
            <!-- Payment Details -->
            <div class="payment-details">PAYMENT DETAILS</div>
            
            <!-- User Details -->
            <div class="user-details">User Details:
            <?php
            if (isset($_SESSION['valid_user'])) {
                $username = $_SESSION['valid_user'];
                echo "$username";
            } else {
                echo "Guest"; // Display a default message for users who are not logged in.
            }
            ?>
            </div>

            <!-- Movie Information -->
            <div class="movie-info">
                <!-- <strong>OPPENHEIMER</strong><br>
                (PG 13 Some Violence & Drug References) -->
            </div>
            <hr>

            <!-- Booking Info -->
            <div class="booking-info">
                <!-- Thu 10/26 08:30 PM <br>
                PUREFRAME JURONG POINT HALL 2 <br>
                Seat ID: SEAT 4 SEAT 5 -->
            </div>
            <hr>

            <!-- Price Details -->
            <div class="price-details">
                <div class="price-line">
                    <span style="padding-bottom: 10px;"><strong>Booking Details:</strong></span>
                    <span></span> <!-- Empty span for alignment -->
                </div>
                <div class="price-line">
                    <!-- <span>1 x Ticket(s)</span>
                    <span>S$10.00</span> -->
                </div>
                <div class="price-line">
                    <!-- <span>Convenience Fee</span>
                    <span>S$1.00</span> -->
                </div>
            </div>
            <hr>
            
            <!-- Total Price -->
            <div class="total-price">
                <div class="price-line">
                    <!-- <span>TOTAL PRICE</span>
                    <span>S$11.00</span> -->
                </div>
            </div>
        </div>
        <div class="right-column">
            <!-- Apple Pay Button -->
            <div class="apple-pay-button">
                <img src="./assets/img/payment_methods/apple_pay_logo.png" alt="Apple Pay" width="15%">
            </div>
            
            <!-- Or Pay Using Text -->
            <div class="or-pay-using">
                OR PAY USING
            </div>
        
            <!-- Payment Method Images -->
            <div class="payment-methods">
                <img class="payment-method" src="./assets/img/payment_methods/payment 1.png" alt="Payment Method 1">
                <img class="payment-method" src="./assets/img/payment_methods/payment 2.png" alt="Payment Method 2">
                <img class="payment-method" src="./assets/img/payment_methods/payment 3.png" alt="Payment Method 3">
                <img class="payment-method" src="./assets/img/payment_methods/payment 4.png" alt="Payment Method 4">
            </div>

            <!-- Card Information -->
            <div class="card-info" id="cardInfo">
                <div class="info-header">CARD INFORMATION</div>
                <input type="text" placeholder="Name on Card" class="name-input">
                <span id="nameError" style="color: red;"></span>
                <input type="text" placeholder="Card Number XXXX XXXX XXXX XXXX" class="card-input">
                <span id="cardNumberError" style="color: red;"></span>
                <input type="date" placeholder="Date" class="date-input" id="dateField" min="">
                <span id="dateError" style="color: red;"></span>
                <input type="text" placeholder="CVC" class="cvc-input">
                <span id="cvcError" style="color: red;"></span>
                <select class="country-select" id="countrySelect">
                    <option value="" disabled selected>Select Country</option>
                    <option value="sg">Singapore</option>
                    <option value="sg">Malaysia</option>
                    <option value="sg">Indonesia</option>
                    <option value="sg">Myanmar</option>
                    <option value="sg">Thailand</option>
                    <option value="sg">Vietnam</option>
                    <option value="sg">Brunei</option>
                    <option value="sg">Cambodia</option>
                    <option value="sg">Laos</option>
                    <option value="sg">Myanmar</option>
                    <option value="sg">Australia</option>
                    <option value="sg">New Zealand</option>
                    <option value="sg">China</option>
                    <option value="sg">Japan</option>
                    <option value="sg">Korea</option>
                    <option value="sg">United States</option>
                </select>
                <span id="countryError" style="color: red;"></span>
                <input type="text" placeholder="ZIP" class="zip-input">
                <span id="zipError" style="color: red;"></span>
            </div>
        
            <!-- Clearfix -->
            <div style="clear:both;"></div>

            <!-- Buttons -->
            <div class="buttons" style="margin-top: 20px;">                
                <form id="update" action="submitPayment.js" method="POST">
                    <button type="button" class="btn" id="cancel" style="width: 30%;">Cancel</button>
                    <!--<button type="button" class="btn" id="submit" style="width: 30%;" disabled></button>-->
                    <input type="submit" name="paymentButton" value="Submit" id="paymentButton"> 
                    <!-- YINQI help style this submit button to look nice -->
                </form>
            </div>
        </div>
    </div>
    <script src="../IE4717/assets/js/payment.js"></script>
    <script src="../IE4717/assets/js/submitPayment.js"></script>
    <script src="../IE4717/assets/js/ticketDetails.js"></script>
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