<?php
// Database connection settings (same as in the upload script)
include('assets/php/connect.php');

$stmt = $conn->prepare("SELECT movie_data, movie_name FROM moviePosters");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($movie_data, $movie_name);

$movies = array(); // Create an array to hold image data
while ($stmt->fetch()) {
    $movies[] = array(
        "name" => $movie_name,
        "data" => base64_encode($movie_data)
    );
}
echo json_encode($movies); // Return the array of image data as JSON

$stmt->close();
$conn->close();
?>
