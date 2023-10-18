<?php
include('assets/php/connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if a file was submitted
if (isset($_POST["submitPoster"])) {
    $movie_name = $_FILES["fileToUpload"]["name"];
    $movie_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

    $stmt = $conn->prepare("INSERT INTO moviePosters (movie_data, movie_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $movie_data, $movie_name);

    if ($stmt->execute()) {
        echo "Poster uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
