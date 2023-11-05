<?php
// Database connection settings (same as in the upload script)
include('assets/php/connect.php');
$futureDate = date('Y-m-d', strtotime('+7 days'));
$stmt = $conn->prepare("SELECT moviePosters.movie_data, movies.movie_title, movies.ratings
FROM movies
INNER JOIN moviePosters ON movies.movie_id = moviePosters.movie_id
WHERE movies.screening_date >= ?");
$stmt->bind_param("s", $futureDate);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($movie_data, $movie_title, $ratings);

$movies = array(); // Create an array to hold image data
while ($stmt->fetch()) {
    $movies[] = array(
        "data" => base64_encode($movie_data),
        "title" => $movie_title,
        "ratings" => $ratings
    );
}
echo json_encode($movies); // Return the array of image data as JSON

$stmt->close();
$conn->close();
?>
