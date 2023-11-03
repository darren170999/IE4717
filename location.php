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
</html>
