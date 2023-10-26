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
    <h1>Upload Long Posters</h1>
    <form action="createLongPosters.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submitPoster">
    </form>
    <h1>Upload Current Movies</h1>
    <form action="createCurrentMovies.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        Movie title
        <input type="text" name="movie_title" id="movie_title"><br>
        sypnopsis
        <input type="text" name="sypnopsis" id="sypnopsis"><br>
        casts
        <input type="text" name="casts" id="casts"><br>
        date
        <input type="date" name="screening_date" id="screening_date"><br>
        <!-- timings
        <input type="time" name="screening_time" id="screening_time"><br> -->
        price
        <input type="number" name="price" id="price"><br>
        ratings
        <input type="number" name="ratings" id="ratings"><br>
        hall_id
        <input type="number" name="hall_id" id="hall_id"><br>
        
        <input type="submit" value="Upload Image" name="submitMovie">
    </form>
</body>
</html>
