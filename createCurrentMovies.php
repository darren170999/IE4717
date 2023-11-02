<?php
include('assets/php/connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if a file was submitted
if (isset($_POST["submitMovie"])) {
    $name = $_FILES["fileToUpload"]["name"];
    $movie_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    $movie_sypnopsis = $_POST["sypnopsis"];
    $movie_title = $_POST["movie_title"];
    $movie_casts = $_POST["casts"];
    $screening_date = $_POST["screening_date"];
    $price = $_POST["price"];
    $ratings = $_POST["ratings"];
    $hall_id = $POST["hall_id"];
    $location_id = $POST["location_id"];

    $stmt = $conn->prepare("INSERT INTO movies (movie_title, sypnopsis, casts, screening_date, price, ratings, hall_id, location_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdiii", $movie_title, $movie_sypnopsis, $movie_casts, $screening_date, $price, $ratings, $hall_id, $location_id);

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
