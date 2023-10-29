<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Frames Booking Page</title>

    <link rel="stylesheet" href="assets/css/style_yinqi_copy.css"> 
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

    <script src="../IE4717/assets/js/scriptBooking.js"></script>
    <script src="../IE4717/assets/js/fetchAssetsForBookings.js"></script>
</body>
</html>