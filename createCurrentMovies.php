<?php
include('assets/php/connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if a file was submitted
if (isset($_POST["submitMovie"])) {
    $name = $_FILES["fileToUpload"]["name"];
    $movie_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    $movie_sypnopsis = $_POST["sypnopsis"]; // Add this line to get the synopsis
    $movie_title = $_POST["movie_title"];
    $movie_casts = $_POST["casts"]; // Add this line to get the casts
    $screening_date = $_POST["screening_date"]; // Add this line to get the screening date
    $hall_id = $POST["hall_id"];
    $price = $_POST["price"]; // Add this line to get the price
    $ratings = $_POST["ratings"]; // Add this line to get the ratings

    $stmt = $conn->prepare("INSERT INTO movies (movie_title, sypnopsis, casts, screening_date, price, ratings, hall_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdii", $movie_title, $movie_sypnopsis, $movie_casts, $screening_date, $price, $ratings, $hall_id);

    if ($stmt->execute()) {
        echo "Movie scheduled successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt = $conn->prepare("INSERT INTO moviePosters (movie_data, movie_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $movie_data, $name);
    
    if ($stmt->execute()) {
        echo "Movie assets uploaded successfully.";
        header("Location: admin.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();

?>
