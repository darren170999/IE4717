<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style_yinqi.css">
    <style>
        body {
            background-color: #000000;  /* Black background */
            color: #FFFFFF;  /* White text */
        }
        .main-content {
            max-width: 1200px; 
            margin: auto; 
            display: flex;
            justify-content: space-between;
        }
        .left-side, .right-side {
            padding: 20px;
            text-align: left;
        }
        .left-side {
            width: 40%;
        }
        .right-side {
            width: 60%;
        }
    
        /* Additional styles for form elements */
        .contact-form label,
        .contact-form input,
        .contact-form textarea {
            display: block;
            margin-bottom: 1.5em;
            width: 100%; /* This makes sure they are the same width */
            box-sizing: border-box; /* This ensures padding is included in the width */
            text-align: left; /* Aligns text to the left */
        }
    
        .form-input {
            padding: 0.5em;
        }
    
        .form-textarea {
            height: 100px; 
            padding: 0.5em;
        }
    
        input[type="submit"] {
            background-color: #FFC300;  /* Yellow background */
            color: black;  /* Black text */
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            width: auto;  /* Resetting the width for the submit button */
        }

        h2, h3 {
            color: #FFC300;
        }
        .contact-form label {
            font-weight: bold;  /* Makes text bold */
            margin-bottom: 8px;  /* Adds some space below the label */
            color: #FFC300;  /* Changes text color to yellow */
            font-size: 14px;  /* Sets font size */
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
</html>
