<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed</title>

    <link rel="stylesheet" href="style_yinqi.css"> 
    <style>
    body {
        background-color: #000000;  /* Black background */
        color: #FFFFFF;  /* White text */
    }
    .email-confirmation {
        text-align: center;
        padding: 2em 2em 2em 2em;  /* Added top padding */
        color: #FFFFFF;  /* White text */
    }

    .email-icon {
        width: 50px;
    }

    .confirmation-line {
        width: 60%;
        margin: auto;
    }

    .highlight-text {
        color: #FFC300; /* From your color palette */
    }

    .link {
        text-decoration: none;
        color: #FFC300; /* From your color palette */
    }

    h1 {
    color: #FFC300; /* Yellow from your palette */
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
            <p>If you did not receive the tickets, <strong class="highlight-text">resend email confirmation</strong> or <strong><a href="contact.php" class="highlight-text link">contact us</a></strong>.</p>
        </div>
        <div class="buttons">
            <a href="index.php" class="btn" id="home">Back to Home</a>
            <a href="profile.php" class="btn" id="ticket">My Bookings</a>
        </div>
    </div>
</body>
</html>