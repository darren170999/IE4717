<?php
include('assets/php/connect.php');
session_start();

if (isset($_SESSION['valid_user'])) {
    if ($_SESSION['valid_user'] === 'SuperAdmin') {
        // User is a SuperAdmin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/adminStyle.css">
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
    <br>
    <div class="form-container">
        <h1>Upload Advertisements</h1>
        <form action="createAds.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <h1>Upload Upcoming Movie Posters</h1>
        <form action="createMovies.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submitPoster">
        </form>
        <h1>Upload Long Posters</h1>
        <form action="createLongPosters.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submitPoster">
        </form>
        <h1>Upload Movies</h1>
        <form action="createCurrentMovies.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            Movie title
            <input type="text" name="movie_title" id="movie_title"><br>
            Synopsis
            <input type="text" name="sypnopsis" id="sypnopsis"><br>
            Casts
            <input type="text" name="casts" id="casts"><br>
            Date
            <input type="date" name="screening_date" id="screening_date"><br>
            Price
            <input type="number" name="price" id="price"><br>
            Ratings
            <input type="number" name="ratings" id="ratings"><br>
            Hall ID
            <input type="number" name="hall_id" id="hall_id"><br>
            Location ID
            <input type="number" name="location_id" id="location_id"><br>

            <input type="submit" value="Upload Image" name="submitMovie">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        // User is not a SuperAdmin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>YOU ARE NOT AN ADMIN</h1>
</body>
</html>
<?php
        // Exit the script to prevent unauthorized users from seeing the admin content
        exit();
    }
} else {
    // User is not logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>YOU ARE NOT LOGGED IN</h1>
</body>
</html>
<?php
}
?>
