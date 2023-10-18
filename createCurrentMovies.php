<?php
include('assets/php/connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if a file was submitted
if (isset($_POST["submitMovie"])) {
    $movie_name = $_FILES["fileToUpload"]["name"];
    $movie_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    $movie_sypnopsis = $_POST["sypnopsis"]; // Add this line to get the synopsis

    $movie_casts = $_POST["casts"]; // Add this line to get the casts
    $screening_days = $_POST["screening_days"]; // Add this line to get the screening days
    $screening_time = $_POST["screening_time"]; // Add this line to get the screening time
    $price = $_POST["price"]; // Add this line to get the price
    $ratings = $_POST["ratings"]; // Add this line to get the ratings

    $stmt = $conn->prepare("INSERT INTO nowShowingMovies (movie_name, movie_data, sypnopsis, casts, screening_days, screening_time, price, ratings) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdi", $movie_name, $movie_data, $movie_sypnopsis, $movie_casts, $screening_days, $screening_time, $price, $ratings);

    if ($stmt->execute()) {
        echo "Movie uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
