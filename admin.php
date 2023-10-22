<?php include('assets/php/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pure Frames</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
    <h1>Upload Current Movies</h1>
    <form action="createCurrentMovies.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        Movie title
        <input type="text" name="movie_name" id="movie_name"><br>
        sypnopsis
        <input type="text" name="sypnopsis" id="sypnopsis"><br>
        casts
        <input type="text" name="casts" id="casts"><br>
        days
        <input type="date" name="screening_days" id="screening_days"><br>
        timings
        <input type="date" name="screening_time" id="screening_time"><br>
        price
        <input type="number" name="price" id="price"><br>
        ratings
        <input type="number" name="ratings" id="ratings"><br>
        
        <input type="submit" value="Upload Image" name="submitMovie">
    </form>
</body>
</html>
