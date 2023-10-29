<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Frames Booking Page</title>

    <link rel="stylesheet" href="style_booking.css"> 
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
</html>
