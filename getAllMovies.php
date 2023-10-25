<?php
include('assets/php/connect.php');

// Get the current date
$currentDate = date('Y-m-d');

// Calculate the date 7 days from today
$endDate = date('Y-m-d', strtotime('+7 days', strtotime($currentDate)));

$stmt = $conn->prepare("SELECT m.movie_id, m.movie_title, m.sypnopsis, m.casts, m.screening_date, m.price, m.ratings, mp.movie_data, mp.movie_name
FROM movies m
INNER JOIN moviePosters mp ON m.movie_id = mp.movie_id
WHERE m.screening_date >= ? AND m.screening_date <= ?;");
$stmt->bind_param("ss", $currentDate, $endDate);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($movie_id, $movie_title, $sypnopsis, $casts, $screening_date, $price, $ratings, $movie_data, $movie_name);

$movies = array();

if ($stmt->execute()) {
    $stmt->store_result();
    $stmt->bind_result($movie_id, $movie_title, $sypnopsis, $casts, $screening_date, $price, $ratings, $movie_data, $movie_name);

    $movies = array();

    while ($stmt->fetch()) {
        $movie = array(
            "movie_id" => $movie_id,
            "movie_title" => $movie_title,
            "sypnopsis" => $sypnopsis,
            "casts" => $casts,
            "screening_date" => $screening_date,
            // "screening_time" => $screening_time,
            "price" => $price,
            "ratings" => $ratings,
            "movie_data" => base64_encode($movie_data),
            "movie_name" => $movie_name
        );

        // Store the movies in the array
        $movies[] = $movie;
    }

    echo json_encode($movies);
} else {
    echo "Error: " . $stmt->error; // Output any MySQL errors
}

$stmt->close();
$conn->close();

?>
