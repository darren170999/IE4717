<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="style_yinqi.css">
    <style>
        body {
            background-color: #000000;  /* Black background */
            color: #FFFFFF;  /* White text */
        }
        .main-content {
            max-width: 1200px; /* or whatever max-width you want */
            margin: auto; /* This will center the content */
            display: flex;
            justify-content: space-between;
        }
        .left-column {
            width: 40%;
            padding: 20px;
        }
        .right-column {
            width: 60%;
            padding: 20px;
        }
        .payment-details {
            background-color: #FFC300; /* Yellow background */
            color: black; /* Black text */
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            text-align: left;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .movie-info, .booking-info {
            text-align: left;
            margin-bottom: 20px;
            padding: 10px;
        }
        hr {
            width: 100%;
        }
        .price-details {
            text-align: left;
            margin-bottom: 20px;
            padding: 10px;
        }
        .price-line {
            display: flex;
            justify-content: space-between;
        }
        .total-price {
            text-align: left;
            margin-bottom: 20px;
            padding: 10px;
            font-weight: bold;
            color: #FFC300;
        }
        .apple-pay-button {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px 0px 15px 0px;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;  /* Match the width of the card-input */
        }
        .or-pay-using {
            text-align: center;
            color: #FFC300;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .payment-methods img {
            width: 20%;
            margin: 2px;
        }
        .card-info {
            display: none; /* Hidden by default */
            margin-bottom: 20px;
        }
        .info-header {
            color: #FFC300;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .name-input, .card-input, .country-select {
            background-color: #ffffff;
            border-radius: 8px;
            width: 100%; 
            float: left;
            padding: 10px 0px 10px 0px;
            margin: 10px 0px;
        }
        .date-input {
            background-color: #ffffff;
            border-radius: 8px;
            width: 40%; 
            float: left;
            padding: 10px;
            margin: 10px 0px;
        }
        .cvc-input {
            background-color: #ffffff;
            border-radius: 8px;
            width: 40%; 
            float: right;
            padding: 10px;
            margin: 10px 0px;
        }
        .zip-input {
            background-color: #ffffff;
            border-radius: 8px;
            width: 50%; 
            float: left;
            padding: 10px;
            margin: 10px 0px;
        }
        .buttons {
            margin-top: 20px;
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

    <!--Content-->
    <div class="main-content">
        <div class="left-column">

            <!-- Payment Details -->
            <div class="payment-details">PAYMENT DETAILS</div>
            
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
                    <button type="button" class="btn" id="submit" style="width: 30%;" disabled>
                    
                    </button>
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
</html>